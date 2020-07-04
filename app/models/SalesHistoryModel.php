<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SalesHistoryModel extends Model
{
    protected $table = "sales";

    protected $fillable = [
    	'total',
    	'payment_method',
        'list_appointment',
        'created_at'
    ];
}