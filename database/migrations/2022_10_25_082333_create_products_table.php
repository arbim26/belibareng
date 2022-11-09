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
            $product->id();
            $product->string('image');
            $product->string('barang');
            $product->string('harga');
            $product->string('stock');
            $product->text('content');
            $product->timestamps();
        });
    }

    /**
     * Reverse the migrations.  
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
