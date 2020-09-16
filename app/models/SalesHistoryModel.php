<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SalesHistoryModel extends Model
{
    protected $table = "sales";

    protected $fillable = [
    	'total',
    	'payment_method',
        'created_at'
    ];
}