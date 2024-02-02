<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'status',
    ];
}
