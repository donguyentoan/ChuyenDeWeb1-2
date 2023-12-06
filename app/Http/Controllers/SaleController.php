<?php

namespace App\Http\Controllers;

use App\Models\ActiveUser;
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
    $activeUsersCount = ActiveUser::count();
    session(['activeUsersCount' => $activeUsersCount]);
    if (auth()->check()) {
        $userRole = auth()->user()->roles;
    
        switch ($userRole) {
            case 0:
                return abort(403);
            case 1:
                return view('Dashboard.Home', ['salesData' => $results]);
            case 2:
                return view('Dashboard.Home', ['salesData' => $results]);
            default:
                return abort(403);
        }
    }
    return abort(403);
    }
}