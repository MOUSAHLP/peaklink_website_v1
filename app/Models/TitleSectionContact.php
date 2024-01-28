<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleSectionContact extends Model
{
    use HasFactory;
    protected $table = 'title_section_contacts';
    protected $fillable = [
        'title_section',
        'description_section',
        'image_section',
    ];
}
