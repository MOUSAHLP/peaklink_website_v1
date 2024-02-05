<?php

namespace App\Models;

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
    ];

    protected $fillable = [
        "name",
        "category_id",
        "price",
        "short_description",
        "long_description",
        "slug",
        "is_in_store",
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    
    public function tags()
    {
        return $this->belongsToMany(ProductTag::class, 'products_tags_relations', 'product_id', 'product_tag_id');
    }

}
