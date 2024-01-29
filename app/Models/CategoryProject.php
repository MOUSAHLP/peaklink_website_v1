<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProject extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title'];
    protected $table = 'category_projects';
    protected $fillable = [
        'title',
        'slug',
        'status',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
