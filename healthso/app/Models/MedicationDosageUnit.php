<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedicationDosageUnit
 */
class MedicationDosageUnit extends Model
{
    protected $table = 'medication_dosage_units';

    protected $primaryKey = 'mdu_id';

	public $timestamps = false;

    protected $fillable = [
        'medication_id',
        'dosage_unit_id'
    ];

    protected $guarded = [];

        
}