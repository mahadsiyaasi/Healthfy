<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Reference extends Model
{
    protected $table = 'reference';
    public $timestamps = false;

    protected $fillable = [
        'min',
        'max',  
        'group_id',
        
    ];
    

    protected $guarded = [];

        
}