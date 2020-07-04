<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";

    protected $fillable = [
    	'name',
    	'purchase_price',
    	'stock',
        'stock_min',
        'expiration_date',
        'categoria_id'
    ];
}
