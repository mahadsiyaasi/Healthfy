<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminPayment
 */
class Healthfeed extends Model
{
    protected $table = 'healthfeed';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'image_title',
        'post',
        'image_post',
        'date',
        'user_id',
        'updated_at',
        'status_id'
    ];

    protected $guarded = [];

        
}