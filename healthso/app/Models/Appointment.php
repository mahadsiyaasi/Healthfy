<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Appointment extends Model
{
    protected $table = 'appointment';
    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'doctor_id',  
        'start_date',
        'end_date',
        'start_time',
        'status_id',
        'company_id',
        'date',
        'amount',
        'disease',
        "end_time"
    ];
    

    protected $guarded = [];

        
}