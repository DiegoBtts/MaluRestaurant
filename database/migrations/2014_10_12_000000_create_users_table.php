<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // Creamos la tabla users con los campos más básicos.
        Schema::create('users',function($table){
            $table->increments('id');
            $table->string('name',100);
            $table->string('username',100)->unique();
            $table->string('password');
            $table->string('role',30);
            $table->timestamp("last_login");
            $table->string('photo',200);
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
        Schema::dropIfExists('users');
    }
}
