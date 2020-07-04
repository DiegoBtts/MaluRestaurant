<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SellModel extends Model
{
    protected $table = "Sell";

    protected $fillable = [
    	'total',
    	'change',
    	'paymenttype'
    ];
}