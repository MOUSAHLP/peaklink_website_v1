<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CallSection extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'phone_button_title', "email_button_title"];
    protected $table = 'call_sections';
    protected $fillable = [
        'title',
        'phone',
        'phone_button_title',
        'email',
        'email_button_title',
        'background_image',
        'status',
    ];


    public function sectionImage()
    {
        return $this->belongsTo(Media::class, 'background_image', 'id');
    }
}
