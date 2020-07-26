<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderFoodProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsorderfood', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('quantity')->unsigned();
            
            $table->bigInteger('orderfood_id')->unsigned();
            $table->bigInteger('products_id')->unsigned();

            $table->foreign('orderfood_id')->references('id')->on('orderfood')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('table__order_food_products');
    }
}