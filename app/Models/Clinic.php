<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminPayment
 */
class Clinic extends Model
{
    protected $table = 'clinic';

    public $timestamps = false;

    protected $fillable = [
        'name',
        //'clinic',
        'doctor_id',
        'city',
        'date'
    ];

    protected $guarded = [];
  
        
}