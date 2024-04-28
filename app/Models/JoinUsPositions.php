<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class JoinUsPositions extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['position'];
    protected $table = 'join_us_positions';

    protected $fillable = ["position", "status"];
}