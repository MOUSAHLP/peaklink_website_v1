<?php

namespace App\Models;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'title_section',
        'image',
        'title',
        'slug',
        'short_description',
        'description',
        'meta_title',
        'meta_image',
        'meta_keywords',
        'meta_description',
        'status',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
