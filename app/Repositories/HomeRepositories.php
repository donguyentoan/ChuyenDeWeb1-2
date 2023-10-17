<?php
namespace App\Repositories;


use App\Models\Products;

class HomeRepositories
{

    public function getAllProducts()
    {
        $products = Products::paginate(3);
     
        return  $products ;
    }

}