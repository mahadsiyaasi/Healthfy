<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestOrderDetail
 */
class TestOrderDetail extends Model
{
    protected $table = 'test_order_detail';
    protected $primaryKey = "detail_id";
    public $timestamps = false;

    protected $fillable = [
        'test_order_id',
        'result',
        'unit',
        'note',
        'test_id',
        'ranges',
        'status_detail_id',
        'visit_amount'
    ];

    protected $guarded = [];

        
}