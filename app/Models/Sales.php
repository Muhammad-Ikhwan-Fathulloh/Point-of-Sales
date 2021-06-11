<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    public function total_jumlah_bayar($awal, $akhir){
    	return $this->whereDate('created_at','>=',$awal)->whereDate('created_at','<=',$akhir)->sum('jumlah_bayar');
    }

    public function total_kembalian($awal, $akhir){
    	return $this->whereDate('created_at','>=',$awal)->whereDate('created_at','<=',$akhir)->sum('kembalian');
	}

	 public function total_grand_total($awal, $akhir){
    	return $this->whereDate('created_at','>=',$awal)->whereDate('created_at','<=',$akhir)->sum('grand_total');
	}

    public function lines(){
        return $this->hasMany('App\Models\Sales_line','sales');
    }
}
