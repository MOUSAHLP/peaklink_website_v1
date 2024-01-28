<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleSectionNotFound extends Model
{
    use HasFactory;

    protected $table = 'title_section_not_founds';
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_title',
        'button_url',
    ];
}
