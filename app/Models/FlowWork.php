<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlowWork extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','short_description'];
    protected $table = 'flow_works';
    protected $fillable = [
        'title',
        'image',
        'short_description',
        'status',
    ];
}
