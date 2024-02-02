<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManageTitlePage extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','description'];
    protected $table = 'manage_title_pages';
    protected $fillable = ["title","description"];
}
