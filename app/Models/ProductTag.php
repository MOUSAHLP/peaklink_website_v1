<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductTag extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        "name",
    ];

    protected $fillable = [
        "name",
        "slug",
        "status",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_tags_relations', 'product_tag_id', 'product_id');
    }
}
