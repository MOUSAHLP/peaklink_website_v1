<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\BlogCategory;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title',  'content', 'meta_title', 'meta_keywords', 'meta_description'];
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        "socials",
        'status',
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
    ];

    public function categories()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
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
