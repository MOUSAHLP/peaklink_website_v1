<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, HasTranslations;
    protected $table = 'settings';

    public $translatable = [
        'location',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'email',
        'phone',
        'location',

        'headerlogo',
        'footerlogo',

        'open_time',
        'close_time',

        'socials',
        'color',
        'maintenance',

        'meta_title', 'meta_image', 'meta_keywords', 'meta_description'
    ];

    public function logo()
    {
        return $this->belongsTo(Media::class, 'meta_image', 'id');
    }

    public function metaImage()
    {
        return $this->belongsTo(Media::class, 'meta_image', 'id');
    }
    public function getPrefixedPhoneAttribute()
    {
        return "+963".$this->phone;
    }
    protected $casts = [
        'meta_keywords' => 'array',
        'socials' => 'json',
        'color' => 'json',
    ];
}
