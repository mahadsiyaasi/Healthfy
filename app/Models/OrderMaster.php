<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class OrderMaster extends Model
{
    protected $table = 'test_order_master';
    public $timestamps = false;

    protected $fillable = [
        'status_id',
        'date',  
        'company_id',
        'user_id',
        'doctor_id',
        'patient_id',
        'total_amount'
    ];
    

    protected $guarded = [];

        
}