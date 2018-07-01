<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 */
class Doctor extends Model
{
    protected $table = 'doctors';

    public $timestamps = false;
    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'tell',
        'email',
        'specialization',
        'datebirth',
        'visit_amount',
        'address',
        'salary',
        'nationality',
        "user_id",
        'status_id',
        'type',
        "company_id"

    ];

    protected $guarded = [];

        
}