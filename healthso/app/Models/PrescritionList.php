<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PrescritionList
 */
class PrescritionList extends Model
{
    protected $table = 'prescrition_list';

    protected $primaryKey = 'pl_id';

	public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'status_id',
        'date'
    ];

    protected $guarded = [];

        
}