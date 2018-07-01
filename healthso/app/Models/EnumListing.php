<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EnumListing
 */
class EnumListing extends Model
{
    protected $table = 'enum_listing';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'group_key',
        'type_key'
    ];

    protected $guarded = [];

        
}