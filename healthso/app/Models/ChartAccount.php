<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 */
class ChartAccount extends Model
{
    protected $table = 'chart_account';

    //protected $primaryKey = 'apointment_id';

	public $timestamps = false;
    protected $fillable = [
        'number',
        'name',
        'description',
        'parent_id',
        'type',
        'category',
        'company_id',
        'status_id',
        "company_id"
        ];

    protected $guarded = [];

        
}