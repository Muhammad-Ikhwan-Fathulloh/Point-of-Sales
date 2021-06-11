<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_supplier;
use App\Models\M_produk;
use App\Models\Purchase_order;
use App\Models\Purchase_order_line;
use App\Models\Goods_receipt;
use App\Models\Perusahaan;

use PDF;


class Po_controller extends Controller
{
    public function index(){
        $title = 'List PO';
        $data = Purchase_order::withCount('lines')->orderBy('created_at','desc')->get();
      

        return view('po.index',compact('title','data'));
    }

    public function pdf($id){
        try {
            $dt = Purchase_order::with('suppliers')->find($id);
            $ph = Perusahaan::first();
 
            $pdf = PDF::loadview('po.pdf',compact('dt','ph'))->setPaper('a4', 'landscape');
            return $pdf->stream();
 
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
        }
 
        return redirect()->back();
    }

    public function add(){
    	$title = 'Add PO';
    	$docno = 'PO-'.rand();
    	$supplier = M_supplier::orderBy('nama','asc')->get();

    	return view('po.add',compact('title','docno','supplier'));
	}

    public function store(Request $request){
        try {
            $produk = $request->produk;
            $qty = $request->qty;

            $document_no = $request->document_no;
            $supplier = $request->supplier;

            $id_po = Purchase_order::insertGetId([
                'document_no'=>$document_no,
                'supplier'=>$supplier,
                'status'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

            foreach ($qty as $e=>$qt) {
                if($qt == 0){
                    continue;
                }

                $dt_produk = M_produk::where('id',$produk[$e])->first();
                $buy = $dt_produk->buy;
                $grand_total = $qt * $buy;

                Purchase_order_line::insert([
                    'purchase_order'=>$id_po,
                    'produk'=>$produk[$e],
                    'qty'=>$qt,
                    'buy'=>$buy,
                    'grand_total'=>$grand_total
                ]);
            }

            \Session::flash('sukses','PO berhasil dibuat');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

	  public function get_produk($id_supplier){
    	$title = 'Add PO';
    	$docno = 'PO-'.rand();
    	$supplier = M_supplier::orderBy('nama','asc')->get();
    	$produk = M_produk::where('supplier',$id_supplier)->get();

    	return view('po.add',compact('title','docno','supplier','produk','id_supplier'));
	}
    public function approved($id){
        try{
            $po = Purchase_order::find($id);

            purchase_order::where('id',$id)->update([
                'status'=>2
            ]);

            Goods_receipt::where('purchase_order',$id)->delete();

            Goods_receipt::insert([
                'purchase_order'=>$id,
                'document_no'=>'GR-'.rand(),
                'status'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

            \Session::flash('sukses','PO berhasil di Approved');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
    public function detail($id){
        $dt= Purchase_order::find($id);
        $title = "Detail PO $dt->document_no";

        return view('po.detail',compact('title','dt'));
    }
    public function update(Request $request, $id){
        try {
            $qty = $request->qty;
            $id_line = $request->id_line;
            $buy = $request->buy;
            $produk = $request->produk;

            foreach ($qty as $e => $dt) {
                $data['qty'] = $dt;
                $data['grand_total'] = $dt * $buy[$e];
                $data['buy'] = $buy[$e];
                // $data['updated_at'] = date('Y-m-d H:i:s');
                $line = $id_line[$e];

                Purchase_order_line::where('id',$line)->update($data);

                M_produk::where('id',$produk[$e])->update([
                    'buy'=>$data['buy']
                ]);
            }

            \Session::flash('sukses','Data berhasil disimpan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function hapus_line($id){
        try{
            Purchase_order_line::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil Dihapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
}
