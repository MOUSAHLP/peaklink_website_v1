<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleSectionService extends Model
{
    use HasFactory;
    protected $table = 'title_section_services';
    protected $fillable = [
        'title_section',
        'description_section',
        'image_section',
    ];
}
