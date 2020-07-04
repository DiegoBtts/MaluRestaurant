<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = "client";

    protected $fillable = [
    	'name',
    	'lastname',
    	'age',
    	'gender'
    ];
}
