<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveMenu extends Model
{
    use HasFactory;
    protected $table = 'active_menus';
    protected $fillable = [
        'title',
        'active',
    ];
}
