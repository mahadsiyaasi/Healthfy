<?php

namespace Health\Models;
use Illuminate\Database\Eloquent\Model;
class Permission extends Model
{
    protected $table = 'permission';
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