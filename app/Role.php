<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Authenticatable, CanResetPassword, HasRole;

/**
 * Class About
 */
class Role extends Model
{
use HasRoles;
    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'status_id',
        'description',
    ];


   protected $guard_name = 'web'; 

    protected $guarded = [];

       
}