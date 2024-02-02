<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'settings';
  
    public $translatable = [
        'social_links',
        'color',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'open_time',
        'close_time',
        'site_name',
        'powered_by'

    ];

    protected $fillable = [
        'email',
        'phone',
        'location_map',

        'headerlogo',
        'footerlogo',

        'open_time',
        'close_time',

        'site_name',
        'powered_by',
        'powered_by_link',

        'social_links',
        'color',
        'maintenance',

        'meta_title','meta_image','meta_keywords','meta_description'
    ];

    protected $casts=[
        'open_time'=>'array',
        'close_time'=>'array',
        'meta_keywords'=>'array',
        'social_links'=>'json',
        'color'=>'json',
    ];
}
