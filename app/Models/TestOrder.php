<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestOrder
 */
class TestOrder extends Model
{
    protected $table = 'test_order';

    protected $primaryKey = 'test_order_id';

	public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'amount',
        'status',
        'date',
        'created_date',
        'update_date'
    ];

    protected $guarded = [];

        
}