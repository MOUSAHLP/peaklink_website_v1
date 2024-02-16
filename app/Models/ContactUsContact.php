<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsContact extends Model
{
    use HasFactory;

    protected $table = "contact_us_contacts";
    protected $fillable = [
        "contacts"
    ];

    protected $casts = ['contacts'=>"array"];
}
