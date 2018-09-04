<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class PrescriptionDetail extends Model
{
    protected $table = 'prescription_detail';
    public $timestamps = false;
    protected $fillable = [
       'prescription_id',
        'medication_id',
        'dosage',
        'frequency_id',
        'duration',
        'instruction',
        'status_id',
    ];
    

    protected $guarded = [];

        
}