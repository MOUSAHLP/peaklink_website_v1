<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurClientReview extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['client_name','description','client_job'];
   
    protected $table = 'our_client_reviews';
    protected $fillable = [
        'client_name',
        'description',
        'client_job',
        'client_image',
        'stars',
        'status',
    ];
}
