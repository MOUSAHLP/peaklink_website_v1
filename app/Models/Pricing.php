<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pricing extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['pricing'];
    protected $table = 'pricing';
    protected $fillable = [
        'pricing',
        'status',
    ];

    protected $casts = ['pricing'=>"json"];
}
