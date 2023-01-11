<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('barang');
            $table->integer('harga');
            $table->integer('minimal_rilis');
            $table->integer('barang_dipesan')->default(0);
            $table->integer('satuan_id')->unsigned();
            $table->integer('jumlah_pack');
            $table->integer('pack_id')->unsigned();
            $table->string('status')->default('menunggu rilis');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.  
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products',function($table)
        {
            $table->foreign('satuan_id')->references('id')->on('orders');
            $table->foreign('pack_id')->references('id')->on('orders');
        });
    }
};
