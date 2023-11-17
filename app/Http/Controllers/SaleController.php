<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
   
    public function index()
    {
        $results = DB::select("
        SELECT
            YEAR(deliveryInformation_date) AS nam,
            MONTH(deliveryInformation_date) AS thang,
            REPLACE(FORMAT(SUM(total_amount), 0), ',', '.') AS doanh_so
        FROM
            orders
        GROUP BY
            YEAR(deliveryInformation_date),
            MONTH(deliveryInformation_date)
        ORDER BY
            nam DESC,
            thang DESC
    ");
    
    return view('Dashboard.Home', ['salesData' => $results]);
        
    }
    
}