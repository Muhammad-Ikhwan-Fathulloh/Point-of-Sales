<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Goods_receipt;

use App\Models\M_produk;

class Gr_controller extends Controller
{
	public function index(){
	
    $title = 'Goods Receipt';
    $data = Goods_receipt::orderBy('created_at','desc')->get();

    return view('gr.index',compact('title','data'));
    }

    public function detail($id){
    	$dt = Goods_receipt::find($id);
    	$title = "detail GR $dt->document_no";

    	return view('gr.detail',compact('title','dt'));
    }
       public function approved($id){
        try {
            $data = Goods_receipt::find($id);

            if($data->status == 2){
                \Session::flash('gagal','Maaf dokumen ini sudah pernah di approved');
                return redirect()->back();
            }

            \DB::transaction(function()use($id,$data){
                Goods_receipt::where('id',$id)->update([
                    'status'=>2
                ]);

                foreach ($data->purchase_orders->lines as $ln) {
                    $qty = $ln->qty;
                    $produk = $ln->produk;

                    $pd = M_produk::find($produk);
                    $stock_sekarang = $pd->stock;
                    $stock_baru = $stock_sekarang + $qty;

                    M_produk::where('id',$produk)->update([
                        'stock'=>$stock_baru
                    ]);
                }
            });

            \Session::flash('sukses','Data berhasil di approved');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
}
