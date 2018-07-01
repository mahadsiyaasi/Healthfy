<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SchedulePatient
 */
class SchedulePatient extends Model
{
    protected $table = 'schedule_patient';

    protected $primaryKey = 'sp_id';

	public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'prescription_id',
        'time',
        'sesson',
        'date'
    ];

    protected $guarded = [];

        
}