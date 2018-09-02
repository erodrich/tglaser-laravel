<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsToPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pedidos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('products_id');
        
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pedidos', function (Blueprint $table) {
            //
            Schema::dropIfExists('pedidos');
        });
    }
}
