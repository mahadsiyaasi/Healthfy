<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PrescritionDetail
 */
class PrescritionDetail extends Model
{
    protected $table = 'prescrition_detail';

    protected $primaryKey = 'pd_id';

	public $timestamps = false;

    protected $fillable = [
        'prescription_id',
        'medication_id',
        'dosage',
        'dosage_unit_id',
        'frequency_id',
        'duration',
        'route_id',
        'status_id'
    ];

    protected $guarded = [];

        
}