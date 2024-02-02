<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhyChooseOurService extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','description','title_experience','facts','features'];
    protected $table = 'why_choose_our_services';
    protected $fillable = [
        'title',
        'description',
        'image',
        'years_of_experience',
        'title_experience',
        'features',
        'facts',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'facts' => 'array',
     ];
}
