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

    public function getSalesData()
    {
        $salesData = DB::table('orders')
            ->select(
                DB::raw('YEAR(deliveryInformation_date) AS nam'),
                DB::raw('MONTH(deliveryInformation_date) AS thang'),
                DB::raw('SUM(total_amount) AS doanh_so')
            )
            ->where('deliveryInformation_date', '>=', now()->subMonths(12))
            ->groupBy(DB::raw('YEAR(deliveryInformation_date), MONTH(deliveryInformation_date)'))
            ->orderByDesc('nam')
            ->orderByDesc('thang')
            ->get();

        return $salesData;
    }

}