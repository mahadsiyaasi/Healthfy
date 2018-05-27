<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DaignosisList
 */
class DaignosisList extends Model
{
    protected $table = 'daignosis_list';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'inclusion_termenole',
        'parent_id',
        'section_id',
        'type_id',
        'body_id'
    ];

    protected $guarded = [];

        
}