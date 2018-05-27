<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 */
class Test extends Model
{
    protected $table = 'tests';

    protected $primaryKey = 'test_id';

	public $timestamps = false;

    protected $fillable = [
        'test_name',
        'substance_tested',
        'type',
        'sub_of',
        'status_id',
        'visit_amount'
    ];

    protected $guarded = [];

        
}