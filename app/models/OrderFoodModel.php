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
    	//'ordertype',
    	'address',
        'phone'
      //  'tablenumber'
  
    ];
    protected $cast=[
        'productslist'=>'array'
    ];
        
    
    //public function Products()
    //{
      //  return $this->hasMany('App\models\ProductsModel','ProductId');
    //}
}