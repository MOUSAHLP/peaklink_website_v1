<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProject extends Model
{
    use HasFactory;
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
