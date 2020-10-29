<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Ordefood;

class CreateOrdeFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Orderfood::create([
            
        ]);
        
        Schema::create('orderfood', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("date");
            $table->string("hour");
            $table->string("name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("ordertype");
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("tablenumber")->nullable();
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
        Schema::dropIfExists('orderfood');
    }
}