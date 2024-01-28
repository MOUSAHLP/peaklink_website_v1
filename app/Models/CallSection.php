<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallSection extends Model
{
    use HasFactory;
    protected $table = 'call_sections';
    protected $fillable = [
        'title',
        'phone',
        'button_title',
        'button_link',
        'background_image',
        'status',
    ];
}
