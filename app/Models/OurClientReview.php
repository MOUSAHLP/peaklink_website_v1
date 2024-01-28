<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClientReview extends Model
{
    use HasFactory;
    protected $table = 'our_client_reviews';
    protected $fillable = [
        'description',
        'client_name',
        'client_job',
        'client_image',
        'stars',
        'status',
    ];
}
