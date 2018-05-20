<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model
{
    protected $table = 'test_order_detail';
    public $timestamps = false;

    protected $fillable = [
        'status_id',
        'test_id',  
        'test_order_id',
        'ranges',
        'units',
        'note',
        'amount',
        "result"
    ];
    

    protected $guarded = [];

        
}