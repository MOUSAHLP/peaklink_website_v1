<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Footer extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['footers','inputSubscrip'];
    protected $table = "footers";

    protected $fillable = [
        'is_inputSubscrip',
        'inputSubscrip',
        'footers'
    ];


    protected $casts = [
        "footers"=>"array",
        "inputSubscrip"=>"array",
    ];

}
