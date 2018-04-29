<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Transuction extends Model
{
    protected $table = 'transactions';
    public $timestamps = false;

    protected $fillable = [
        'patient_id',  
        'date',
        'amount',
        'discount',
        'balance',
        'order_id',
        'order_type',
        'trunsaction_type',
        'status_id',
        'account',
        "company_id"
    ];
    

    protected $guarded = [];

        
}