<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Measurement
 */
class Measurement extends Model
{
    protected $table = 'measurements';

    public $timestamps = false;

    protected $fillable = [
        'time',
        'measurement',
        'measurementsub',
        'measurement_unit_id',
        'measurement_sub_unit_id',
        'measurement_type_id',
        'systolic',
        'systolic_unit_id',
        'diastolic',
        'diastolic_unit_id',
        'pulse',
        'pulse_unit_id',
        'date',
        'irregular_heartbeat_detected',
        'measurement_context_id',
        'collection_type_id',
        'patient_id',
        'doctor_id',
        'note',
        'status_id',
        "company_id"
    ];

    protected $guarded = [];

        
}