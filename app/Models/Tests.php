<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
class Tests extends Model
{
    protected $table = 'tests';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',  
        'status_id',
        'amount',
        'report',
        'advice',
        'low',
        'parent_id',
        'description'
        ];
    

    protected $guarded = [];

        
}