<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales_line extends Model
{
    protected $table = 'Sales_line';

    public function produks(){
    	return $this->belongsTo('App\Models\M_produk','produk');

    }
}
