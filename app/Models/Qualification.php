<?php

namespace Healthfy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
/**
 * Class Doctor
 */
class Qualification extends Model implements HasMedia
{
     use HasRoles;
     use HasMediaTrait;
   
    protected $table = 'qualification';

    public $timestamps = false;
    public $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'qualification',
        'school',
        'year',
        'date',
        'status_id',
        'file',
    ];

    protected $guarded = [];
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
        
}