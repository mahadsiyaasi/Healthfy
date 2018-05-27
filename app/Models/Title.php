<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 */
class Title extends Model
{
    protected $table = 'titles';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'explanation',
        'type',
        'company_id'
    ];

    protected $guarded = [];

        
}