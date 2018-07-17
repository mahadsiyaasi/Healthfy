<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Permissions extends Model
{
    protected $table = 'permissions';
    //protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'parent_id',
        'level_id',
        'sort',
        'type_id',
        'url',
        'target',
        'status_id'
    ];

    protected $guarded = [];

        
}