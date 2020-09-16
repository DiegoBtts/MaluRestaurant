<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdeFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderfood', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("date");
            $table->string("hour");
            $table->string("name");
            $table->string("last_name");
            $table->string("ordertype");
            $table->string("address");
            $table->string("phone");
            $table->string("tablenumber");
            $table->integer("status");
            $table->json("products");
            $table->json("quantity");
            
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
        Schema::dropIfExists('orde_food');
    }
}