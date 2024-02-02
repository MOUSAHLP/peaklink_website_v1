<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name','position'];
   
protected $fillable=[
    "name",
    "position",
    "image",
    "socials",
];

protected $casts = [
    'socials' => 'json',
];
}
