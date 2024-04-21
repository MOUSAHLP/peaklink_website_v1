<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamDetail extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['description', 'skills_title', 'skills_description', "skills"];

    protected $fillable = [
        "team_id",
        "description",
        "email",
        "phone",
        "website",
        "image",
        "skills_title",
        "skills_description",
        "skills",
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }


    protected $casts = [
        'skills' => 'json',
    ];
}
