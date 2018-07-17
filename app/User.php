<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'status_id',
        'default_language_id',
        'company_id',
        'mobile',
        'phone',
        'address',
        'city',
        'country',
        'default_cash_account_id',
        'role_type_id',
        'date',
        'updated_date',
        'registered_by',
        'remember_token'
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
{   
    $this->attributes['password'] = bcrypt($password);
}
}
