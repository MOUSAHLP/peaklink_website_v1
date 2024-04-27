<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['question','answer'];

    protected $table = 'faqs';
    protected $fillable = [
        'question',
        'answer',
        'status',
    ];
}
