<?php
namespace App\Repositories;


use App\Models\Products;

class HomeRepositories
{

    public function getAllProducts()
    {
        $products = Products::all();
     
        return  $products ;
    }

}