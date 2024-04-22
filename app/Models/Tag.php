<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    protected $table = 'tags';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
