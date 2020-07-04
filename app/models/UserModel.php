<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "users";

    protected $fillable = [
    	'id',
        'name',
        'username',
        'password',
        'role',
        'last_login'
    ];
}
