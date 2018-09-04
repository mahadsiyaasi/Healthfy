<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 */
class Variables extends Model
{
    protected $table = 'varaible_lists';

    public $timestamps = false;

    protected $fillable = [
        'status_id',
        'status_name',
        'description',
        'group_key',
        'type_key',
    ];

    protected $guarded = [];

        
}