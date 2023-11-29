<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;




class OrderRepositories
{

    public function getAllOrder()
    {
        $result = DB::table('orders')
        ->select(
            'orders.id',
            'orders.customer_id',
            'products.name as nameproduct',
            'order_details.quantity',
            'order_details.price',
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
        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->paginate(2);

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
            ->paginate(3);

        return $salesData;
    }

}