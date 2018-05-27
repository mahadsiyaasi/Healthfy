<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FrequencyList
 */
class FrequencyList extends Model
{
    protected $table = 'frequency_list';

    protected $primaryKey = 'fl_id';

	public $timestamps = false;

    protected $fillable = [
        'Name',
        'abbreviation',
        'explanation',
        'hoursInBetween'
    ];

    protected $guarded = [];

        
}