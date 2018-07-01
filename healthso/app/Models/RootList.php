<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RootList
 */
class RootList extends Model
{
    protected $table = 'root_list';

    protected $primaryKey = 'rl_id';

	public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}