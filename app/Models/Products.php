<?php
namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Products extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_product',
        'name',
        'description',
        'image',
        'price',
        'like_count',
        'Category_id',
        'manufacture_id',
        'like_count',
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




