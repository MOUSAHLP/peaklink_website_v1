<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleSectionAbout extends Model
{
    use HasFactory;
    protected $table = 'title_section_abouts';
    protected $fillable = [
        'title_section',
        'description_section',
        'image_section',
    ];
}
