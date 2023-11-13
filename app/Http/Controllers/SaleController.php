<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
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



        return view('sale' , ["saledata" => $salesData]);

    

    }
}
