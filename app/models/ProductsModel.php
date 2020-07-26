<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";

    protected $fillable = [
    	'name',
    	'price'
    	
    ];
    
    public function orderfood() {
    return $this->belongsToMany(OrderfoodModel::class);

    }
}