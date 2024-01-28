<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $fillable = [
        'service_id',
        'question',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
