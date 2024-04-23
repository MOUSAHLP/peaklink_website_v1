<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        "name",
        "short_description",
        "long_description",
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
    ];

    protected $fillable = [
        "name",
        "category_id",
        "image",
        "demo_url",
        "short_description",
        "long_description",
        "slug",
        "status",
        "socials",
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


    public function tags()
    {
        return $this->belongsToMany(ProductTag::class, 'products_tags_relations', 'product_id', 'product_tag_id');
    }

    public function metaImage()
    {
        return $this->belongsTo(Media::class, 'meta_image', 'id');
    }

    protected $casts = [
        'meta_keywords' => 'array',
        'tags' => 'array',
        'socials' => 'json',
    ];
}
