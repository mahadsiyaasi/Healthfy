<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedicationStrenght
 */
class MedicationStrenght extends Model
{
    protected $table = 'medication_strenght';

    protected $primaryKey = 'ms_id';

	public $timestamps = false;

    protected $fillable = [
        'medication_id',
        'strenght',
        'strenght_unit_id'
    ];

    protected $guarded = [];

        
}