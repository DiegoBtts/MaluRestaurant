<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("RFC",13);
            $table->string("business_name",50);
            $table->string("state",50);
            $table->string("citie",50);
            $table->string("address",50);
            $table->string("CP",50);
            $table->string("phone",50);
            $table->string("email",50);
            $table->bigInteger("sales")->unsigned();
            $table->foreign("sales")->references("id")->on("sales")->onDelete("cascade");
            
            
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
        Schema::dropIfExists('invoices');
    }
}