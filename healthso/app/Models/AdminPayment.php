<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminPayment
 */
class AdminPayment extends Model
{
    protected $table = 'admin_payment';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'number',
        'provider',
        'secret',
        'owner',
        'Parent_id'
    ];

    protected $guarded = [];

        
}