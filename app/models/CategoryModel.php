<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "Category";

    protected $fillable = [
    	'name'
    ];
}
