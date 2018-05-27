<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 */
class Company extends Model
{
    protected $table = 'companies';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slogan',
        'logo',
        'country',
        'state',
        'city',
        'distruct',
        'address',
        'default_curency_id',
        'tell',
        'mobile',
        'email',
        'parent_id',
        'status_id',
        'code'
    ];

    protected $guarded = [];

        
}