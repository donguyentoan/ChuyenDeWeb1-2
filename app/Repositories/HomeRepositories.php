<?php
namespace App\Repositories;


use App\Models\Products;

class HomeRepositories
{

    public function getAllProducts()
    {
        $products = Products::paginate(8);
     
        return  $products ;
    }

}