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
    	'ordertype',
    	'address',
        'phone',
        'tablenumber',
        'status'
    ];
    
    protected $cast=[
        'productslist'=>'array'
    ];
        
    
    public function products() {
    return $this->belongsToMany('App\models\ProductsModel');
}
}