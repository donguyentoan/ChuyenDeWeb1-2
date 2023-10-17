<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;




class OrderRepositories
{

    public function getAllOrder()
    {
        $result = DB::table('orders')
        ->select(
            'orders.customer_id',
            'products.name as nameproduct',
            'orderdetails.quantity',
            'orderdetails.price',
            'delivery_informations.name',
            'delivery_informations.date_order',
            'orders.total_amount',
            'orders.status',
            'orders.payment_method',
            'delivery_informations.apartmentNumber',
            'delivery_informations.StreetNames',
            'delivery_informations.details'
        )
        ->join('delivery_informations', 'orders.customer_id', '=', 'delivery_informations.id')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
        ->join('products', 'products.id', '=', 'orderdetails.product_id')
        ->get();

        return  $result;

    }

}