<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseOurService extends Model
{
    use HasFactory;
    protected $table = 'why_choose_our_services';
    protected $fillable = [
        'title_section',
        'description',
        'title',
        'image',
        'status',
    ];
}
