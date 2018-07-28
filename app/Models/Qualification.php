<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 */
class Qualification extends Model
{
    protected $table = 'qualification';

    public $timestamps = false;
    public $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'qualification_id',
        'college_id',
        'year',
        'date',
        'status_id',
    ];

    protected $guarded = [];

        
}