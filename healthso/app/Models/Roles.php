<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 */
class Roles extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'status_id',
        'description',
    ];

    protected $guarded = [];

        
}