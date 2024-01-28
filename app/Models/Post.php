<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'user_id',
        'tag_id',
        'title',
        'slug',
        'content',
        'image',
        'status',
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
