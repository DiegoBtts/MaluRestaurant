<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiptsamples', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger("appointment_id")->unsigned();
            $table->date("receiptsamplesdate");
            $table->string("hour");
            $table->longText("code");
            $table->bigInteger("product_id")->unsigned()->nullable();
            $table->foreign("appointment_id")->references("id")->on("appointment")->onDelete('cascade');
            $table->foreign("product_id")->references("id")->on("products")->onDelete('cascade');
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
        Schema::dropIfExists('receiptsamples');
    }
}
