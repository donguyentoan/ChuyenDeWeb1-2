<?php
namespace App\Repositories;


use App\Models\Products;
use App\Models\Banners;

class HomeRepositories
{

    public function getAllProducts()
    {
        $products = Products::paginate(8);
     
        return  $products ;
    }

    public function getAllBanners()
    {
        $banners = Banners::all();
     
        return  $banners ;
    }

}