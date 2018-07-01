<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestUnit
 */
class TestUnit extends Model
{
    protected $table = 'test_units';

    public $timestamps = false;

    protected $fillable = [
        'test_id',
        'unit_name'
    ];

    protected $guarded = [];

        
}