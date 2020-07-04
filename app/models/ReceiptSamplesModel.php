<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ReceiptSamplesModel extends Model
{
    protected $table = "receiptsamples";

    protected $fillable = [
    	'id',
    	'appointment_id',
    	'receiptsamplesdate',
        'hour',
        'code',
        'create_at'    	
    ];
}