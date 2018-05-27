<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BasicTest
 */
class BasicTest extends Model
{
    protected $table = 'basic_tests';

    protected $primaryKey = 'test_id';

	public $timestamps = false;

    protected $fillable = [
        'specialist_doctor',
        'test_name',
        'test_type',
        'labname',
        'labnumber'
    ];

    protected $guarded = [];

        
}