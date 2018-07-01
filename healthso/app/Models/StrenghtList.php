<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StrenghtList
 */
class StrenghtList extends Model
{
    protected $table = 'strenght_list';

    protected $primaryKey = 'sl_id';

	public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}