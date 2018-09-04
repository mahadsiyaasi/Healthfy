<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class Patient extends Model
{
    protected $table = 'patients';
    public $timestamps = false;

    protected $fillable = [
        'patient_name',
        'country',  
        'state',
        'district',
        'address',
        'patient_tell',
        'datebirth',
        'gender',
        'date',
        "user_id",
        "status_id",
        "company_id"
    ];
    

    protected $guarded = [];

        
}