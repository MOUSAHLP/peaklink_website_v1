<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinUsForm extends Model
{
    use HasFactory;
    protected $table = 'join_us_forms';
    protected $fillable = [
        'join_us_position_id',
        'full_name',
        'email',
        'phone',
        'message',
        'file',
    ];

    public function position()
    {
        return $this->belongsTo(JoinUsPositions::class, "join_us_position_id", "id");
    }
}
