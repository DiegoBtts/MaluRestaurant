<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class InvoicesModel extends Model
{
    protected $table = "invoices";

    protected $fillable = [
        'RFC',
        'business_name',
        'state',
        'citie',
        'address',
        'CP',
        'phone',
        'email'
    	
    ];
    
   
}