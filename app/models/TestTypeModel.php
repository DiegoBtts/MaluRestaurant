<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TestTypeModel extends Model
{
    protected $table = "testtype";

    protected $fillable = [
    	'name',
    	'description',
    	'sample_id'
    ];
}