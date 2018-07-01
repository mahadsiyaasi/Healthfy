<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedicationRoute
 */
class MedicationRoute extends Model
{
    protected $table = 'medication_route';

    protected $primaryKey = 'mr_id';

	public $timestamps = false;

    protected $fillable = [
        'medication_id',
        'route_id'
    ];

    protected $guarded = [];

        
}