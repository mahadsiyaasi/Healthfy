<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 */
class permissionMaping extends Model
{
    protected $table = 'permission_maping';
    public $timestamps = false;

    protected $fillable = [
        'entity_id',
        'entity_type_id',
        'permission_id',
        'status_id'
    ];

    protected $guarded = [];

        
}