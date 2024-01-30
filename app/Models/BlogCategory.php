<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];
    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
}
