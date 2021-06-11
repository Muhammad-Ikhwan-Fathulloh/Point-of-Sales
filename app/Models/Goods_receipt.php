<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Purchase_order_line;

class Goods_receipt extends Model
{
    protected $table = 'goods_receipt';

    public function statuss(){
    	return $this->belongsTo('App\Models\M_status','status');
    }

    public function purchase_orders(){
    	return $this->belongsTo('App\Models\Purchase_order','purchase_order')->withDefault(['grand_total'=>null]);
    }

    public function total_item(){
    	$id_po = $this->purchase_order;
    	$total = Purchase_order_line::where('purchase_order',$id_po)->count();
    	return $total;
    }
}
