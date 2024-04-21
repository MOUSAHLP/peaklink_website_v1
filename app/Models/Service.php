<?php

namespace App\Models;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = [
        'title',
        'description',
        'short_description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'faq',
    ];

    protected $table = 'services';

    protected $fillable = [
        'image',
        'title',
        'slug',
        'short_description',
        'description',
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
        'status',
        'service_category_id',
        'faq',
    ];


    protected $casts = [
       'faq' => 'json',
       'meta_keywords' => 'array',
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
