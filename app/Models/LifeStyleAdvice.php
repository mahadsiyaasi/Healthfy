<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LifeStyleAdvice
 */
class LifeStyleAdvice extends Model
{
    protected $table = 'life_style_advice';

    public $timestamps = false;

    protected $fillable = [
        'advice',
        'doctor_id',
        'patient_id',
        'prescription_id'
    ];

    protected $guarded = [];

        
}