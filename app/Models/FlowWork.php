<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowWork extends Model
{
    use HasFactory;
    protected $table = 'flow_works';
    protected $fillable = [
        'title_section',
        'image',
        'title',
        'short_description',
        'status',
    ];
}
