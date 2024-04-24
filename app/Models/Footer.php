<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Footer extends Model
{
    use HasFactory, HasTranslations;
    protected $table = "footers";
    public $translatable = ['name', 'links'];

    protected $fillable = [
        'name',
        'links',
    ];

    protected $casts = [
        "links" => "array",
    ];
    
}
