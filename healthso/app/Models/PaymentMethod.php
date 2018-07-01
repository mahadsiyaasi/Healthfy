<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class PaymentMethod extends Model
{
    protected $table = 'payment_method';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'provider_name',  
        'company_id',
        'status_id',
        'description',
        'parent_id',
        'account',
    ];   

    protected $guarded = [];

        
}