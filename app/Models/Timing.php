<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminPayment
 */
class Timing extends Model
{
    protected $table = 'timing';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'clinic_id',
        'date',
    ];

    protected $guarded = [];
    //public function setDateAttribute($date);
        
}