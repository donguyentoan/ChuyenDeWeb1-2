<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'name',
        'description',
        'image',
        'price',
        'categories_id',
        'manufactures_id',
    ];
    public function categories()
    {
        return $this->hasMany(Categories::class);
    }
}

