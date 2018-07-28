<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EnumListing
 */
class EnumListing extends Model
{
    protected $table = 'varaible_lists';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'group_key',
        'type_key'
    ];

    protected $guarded = [];

        
}