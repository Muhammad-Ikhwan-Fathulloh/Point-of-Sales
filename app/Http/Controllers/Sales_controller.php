<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sales;

class Sales_controller extends Controller
{
    public function index(){
    	$title = "History Transaksi POS";
    	$data = Sales::withCount('lines')->orderBy('created_at','desc')->get();

	    $awal = date('Y-m-d', strtotime('-1 days'))	;
	    $akhir = date('Y-m-d');

    	return view('sales.index',compact('title','data','awal','akhir'));
    }

    public function detail($id){
        $dt = Sales::find($id);
        $title = "Detail Transaksi $dt->no_struk";

        return view('sales.detail',compact('title','dt'));
    }

    public function filter(Request $request){
    	$awal = date('Y-m-d',strtotime($request->awal));
    	$akhir = date('Y-m-d',strtotime($request->akhir));

    	$title = "History Transaksi POS $awal s/d $akhir";
    	$data = Sales::whereDate('created_at','>=',$awal)->whereDate('created_at','<=',$akhir)->orderBy('created_at','desc')->get();

    	return view('sales.index',compact('title','data','awal','akhir'));
    }
}
