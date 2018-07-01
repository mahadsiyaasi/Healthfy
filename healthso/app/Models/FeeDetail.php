<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FeeDetail
 */
class FeeDetail extends Model
{
    protected $table = 'fee_detail';

    protected $primaryKey = 'fee_id';

	public $timestamps = false;

    protected $fillable = [
        'sf_id',
        'start_date',
        'end_date',
        'amount',
        'permission_id',
        'account_type_id'
    ];

    protected $guarded = [];

        
}