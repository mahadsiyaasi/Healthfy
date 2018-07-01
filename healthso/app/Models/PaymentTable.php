<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentTable
 */
class PaymentTable extends Model
{
    protected $table = 'payment_table';

    protected $primaryKey = 'payment_id';

	public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'order_id',
        'order_type',
        'amount',
        'discount',
        'balance',
        'STATUS',
        'date'
    ];

    protected $guarded = [];

        
}