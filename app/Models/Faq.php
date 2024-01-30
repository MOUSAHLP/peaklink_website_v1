<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','title','questions'];

    protected $table = 'faqs';
    protected $fillable = [
        'title',
        'image',
        'questions',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    protected $casts = [
        'questions' => 'array',
     ];
}
