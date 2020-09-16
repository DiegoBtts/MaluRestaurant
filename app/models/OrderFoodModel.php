<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class OrderFoodModel extends Model
{
    protected $table = "OrderFood";

    protected $fillable = [
        'id',
        'date',
        'hour',
        'name',
        'last_name',
    	'ordertype',
    	'address',
        'phone',
        'tablenumber',
        'status'
    ];
    
    protected $cast=[
        'products'=>'array',
        'quantity'=>'array'
    ];

    
        
    
  

}