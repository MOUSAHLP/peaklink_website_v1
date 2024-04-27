<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductForm extends Model
{
    use HasFactory;
    protected $table = 'product_forms';
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'message',
        'file',
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
