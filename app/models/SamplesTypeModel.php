<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SamplesTypeModel extends Model
{
    protected $table = "samplestype";

    protected $fillable = [
    	'name',
    	'description'
    ];
}