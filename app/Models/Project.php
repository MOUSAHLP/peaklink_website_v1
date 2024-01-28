<?php

namespace App\Models;

use App\Models\CategoryProject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'category_project_id',
        'title',
        'image',
        'description',
        'date',
        'client_name',
        'website',
        'location',
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProject::class, 'category_project_id');
    }
}
