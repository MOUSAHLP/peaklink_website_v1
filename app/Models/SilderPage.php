<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SilderPage extends Model
{
    
    use HasFactory, HasTranslations;
    public $translatable = ['title','description','button_title'];
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
