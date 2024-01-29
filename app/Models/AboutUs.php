<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','description','label_title','facts'];

    protected $table = 'about_us';
    protected $fillable = [
        'title',
        'description',
        'facts',
        'phone',
        'back_image',
        'video',
        'label_title',
    ];

    
    protected $casts = [
        'facts' => 'array',
     ];


}
