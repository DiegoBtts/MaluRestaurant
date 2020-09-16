<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SaleModel extends Model
{
    protected $table = "sales";

    protected $fillable = [
    	'id',
    	'total',
    	'payment_method'
    ];
}