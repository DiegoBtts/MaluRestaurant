<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GroupsModel extends Model
{
    protected $table = "groups";

    protected $fillable = [
    	'id',
    	'table_name',
    	'user_id',
    	'count_field',
    	'type_test',
		'created_at',
		'price'
    ];
}