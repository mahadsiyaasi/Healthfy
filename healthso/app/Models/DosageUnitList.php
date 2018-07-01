<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DosageUnitList
 */
class DosageUnitList extends Model
{
    protected $table = 'dosage_unit_list';

    protected $primaryKey = 'dul_id';

	public $timestamps = false;

    protected $fillable = [
        'dosage_unit_name'
    ];

    protected $guarded = [];

        
}