<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string("appointment_code",50);
            $table->bigInteger("client_id")->unsigned();
            $table->string("type",20);
            $table->date("date");
            $table->string("hour");
            $table->bigInteger("exam_id")->unsigned();
            $table->integer("index");
            $table->integer("status");
            $table->longText("code");
            $table->foreign("client_id")->references("id")->on("client")->onDelete('cascade');
            $table->timestamps();
            $table->foreign("exam_id")->references("id")->on("groups")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
