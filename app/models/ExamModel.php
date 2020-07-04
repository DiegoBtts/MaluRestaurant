<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    protected $table = "exam";

    protected $fillable = [
    	'id',
    	'id_appointment',
    	'status',
    	'created_at'
    ];
}