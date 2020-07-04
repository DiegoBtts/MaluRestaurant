<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    protected $table = "appointment";

    protected $fillable = [
        'id',
        'appointment_code',
        'client_id',
        'type',
        'date',
        'hour',
        'exam_id',
        'index',
        'status'    	
    ];
}