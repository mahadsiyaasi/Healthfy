<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class Unit extends Model
{
    protected $table = 'units';
    public $timestamps = false;

    protected $fillable = [
        'unit',
        'group_id'
    ];
    

    protected $guarded = [];

        
}