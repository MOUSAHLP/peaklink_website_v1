<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'contact_us_tools',
        'social_media',
        'colors',
        'site_active',
        'open_time',
        'close_time',
        'site_name',
        'powered_by',
        'powered_by_link',
        'location_map',
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
    ];
}
