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
        'Category_id',
        'Manufacture_id',
        'Combo_id',
    ];
    public function categories()
    {
        return $this->hasMany(Categories::class);
    }
}
