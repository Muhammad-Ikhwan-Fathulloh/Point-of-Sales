<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoodsReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_receipt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order')->unsigned();
            $table->string('document_no',115);
            $table->integer('status')->unsigned();
            $table->timestamps();

            // $table->foreign('purchase_order')->reference('id')->on('purchase_order')->onDelete('restrict');


            // $table->foreign('status')->reference('id')->on('m_status')->onDelete('restrict');

            $table->engine ='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_receipt', function (Blueprint $table) {
            //
        });
    }
}
