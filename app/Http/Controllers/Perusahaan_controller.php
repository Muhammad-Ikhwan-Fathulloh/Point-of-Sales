<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Perusahaan;

class Perusahaan_controller extends Controller
{
    public function index(){
    	$title = 'Update Data Perusahaan';
    	$dt = Perusahaan::first();

    	return view('perusahaan.index',compact('title','dt'));
    }

    public function update(Request $request){
    	try {
    		$dt = Perusahaan::first();

    		$a = $request->except(['_token','_method','photo']);
    		$a['updated_at'] = date('Y-m-d H:i:s');

    		Perusahaan::where('id',$dt->id)->update($a);

    		\Session::flash('sukses','Data berhasil disimpan');
    	} catch (\Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect()->back();
    }
}
