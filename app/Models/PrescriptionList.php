<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class PrescriptionList extends Model
{
    protected $table = 'prescription_list';
    public $timestamps = false;
    protected $fillable = [
       'patient_id',
      "doctor_id",
      "status_id",
      'company_id',
      "date"
    ];
    

    protected $guarded = [];

        
}