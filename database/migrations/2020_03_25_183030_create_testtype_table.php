<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesttypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testtype', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name",50);
            $table->string("description",50);
            $table->BigInteger("sample_id")->unsigned();
            $table->foreign("sample_id")->references("id")->on("samplestype")->onDelete("cascade");
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
        Schema::dropIfExists('testtype');
    }
}
