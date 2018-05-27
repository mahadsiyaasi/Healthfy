<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 */
class UserRoleMaping extends Model
{
    protected $table = 'user_role_maping';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'role_id',
        'status_id'
    ];

    protected $guarded = [];

        
}