<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 */
class Transaction extends Model
{
    protected $table = 'transactions';

    protected $primaryKey = 'payment_id';

	public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'order_id',
        'order_type',
        'amount',
        'discount',
        'balance',
        'status',
        'account',
        'trunsaction_type',
        'date',
        "company_id"
    ];

    protected $guarded = [];

        
}