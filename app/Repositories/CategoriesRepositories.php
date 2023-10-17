<?php
namespace App\Repositories;


use App\Models\Products;
use App\Models\Categories;

class  CategoriesRepositories
{

    public function getAllCategories()
    {
        $categories = Categories::all();
        return   $categories;
    }
    
}
