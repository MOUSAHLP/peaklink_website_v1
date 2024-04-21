<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CallSection extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','button_title'];
    protected $table = 'call_sections';
    protected $fillable = [
        'title',
        'phone',
        'button_title',
        'button_link',
        'background_image',
        'status',
    ];

    
    public function sectionImage()
    {
        return $this->belongsTo(Media::class, 'background_image', 'id');
    }
}
