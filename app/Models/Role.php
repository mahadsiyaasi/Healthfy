<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 */
class Roles extends Model
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

        public function users()
		{
		  return $this->belongsToMany(User::class);
		}
}