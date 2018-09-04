<?php

namespace Healthfy\Models;
use Healthfy\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 */
class Roles extends Model
{
   protected $table = 'role';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'status_id',
        'description',
    ];
   protected $guarded = [];
}