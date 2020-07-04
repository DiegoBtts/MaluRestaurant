<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_name',50);
            $table->integer("count_field");
            $table->decimal("price");
            $table->string("form_route",100);
            $table->string("table_route",100);
            $table->integer('user_id')->unsigned();
            $table->bigInteger("typeTest_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("typeTest_id")->references("id")->on("testtype")->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
}