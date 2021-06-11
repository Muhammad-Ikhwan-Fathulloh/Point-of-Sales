<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sales;
use App\Models\M_supplier;
use App\Models\M_produk;
use App\Models\Purchase_order;
use auth;

class Landing_controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth->user()->level==1) {
            # code...
        }else{
            return view('landing.land');
        }

        
    }
}
