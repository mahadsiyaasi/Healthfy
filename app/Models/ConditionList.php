<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConditionList
 */
class ConditionList extends Model
{
    protected $table = 'condition_list';

    protected $primaryKey = 'condition_id';

	public $timestamps = false;

    protected $fillable = [
        'conditions',
        'status_id',
        'start_date',
        'end_date',
        'howitended',
        'diagnosis_id',
        'date',
        'status_id',
        "company_id"
    ];

    protected $guarded = [];

        
}