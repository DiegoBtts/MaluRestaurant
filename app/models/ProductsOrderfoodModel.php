<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductsOrderfoodModel extends Model
{
    protected $table = "productsorderfood";

    protected $fillable = [
    	'quantity',
    	
    	
    ];
    
    public function orderfood() {
    return $this->belongsToMany(OrderfoodModel::class);

    }
}