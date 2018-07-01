<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestRange
 */
class TestRange extends Model
{
    protected $table = 'test_range';

    public $timestamps = false;

    protected $fillable = [
        'test_id',
        'min',
        'max',
        'optional_text'
    ];

    protected $guarded = [];

        
}