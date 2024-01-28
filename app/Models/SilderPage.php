<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SilderPage extends Model
{
    use HasFactory;
    protected $table = 'silder_pages';
    protected $fillable = [
        'title',
        'description',
        'button_link',
        'button_title',
        'video',
        'image',
        'status',
    ];
}
