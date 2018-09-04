<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class MedicationList extends Model
{
    protected $table = 'medication_list';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'effect',  
        'company_id',
        'status_id',
        'strenght',
        'unit_id'
    ];   

    protected $guarded = [];

        
}