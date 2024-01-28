<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitlePageProject extends Model
{
    use HasFactory;
    protected $table = 'title_page_projects';
    protected $fillable = [
        'title_section',
        'description_section',
        'image_section',
    ];
}
