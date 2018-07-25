<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Staff extends Model
{
    protected $table = 'staff';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'tell',
        'email',
        'specialization',
        'nationality',
        'salary',
        'address',
        'visit_amount',
        'datebirth',
        "user_id",
        'type',
        "status_id",
        "degree",
        "gender",
        "about",
        "experience",
        "title",
        "city",
        "company_id"
    ];
    

    protected $guarded = [];

        
}