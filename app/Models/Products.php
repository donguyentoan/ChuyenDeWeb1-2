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
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'id_product');
    }

    // Method to get the like count
    public function getLikeCount()
    {
        // Ensure there are likes associated with the product
        return $this->likes->count();
    }
}
