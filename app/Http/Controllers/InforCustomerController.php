<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryInformations;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InforCustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user == null) {
            return redirect("/auth/login");
        }
        $delivery_informations = DeliveryInformations::where('phone', $user->phone)->latest()->first();

        //dd($orderdetails);
        return view('InforCustomer.inforCustomer', compact('user', 'delivery_informations'));
    }

    public function showaddress()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect("/auth/login");
        }
        return view('InforCustomer.customerAddress', compact('user'));
    }

    public function orderHistory()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect("/auth/login");
        }

        $delivery_informations = DeliveryInformations::where('phone', $user->phone)->latest()->first();


        if ($delivery_informations) {
            $orders = Orders::where('customer_id', $delivery_informations->id)->get();

            $products = [];
            if ($orders) {
                foreach ($orders as $order) {
                    $orderdetails = OrderDetails::where('order_id', $order->id)->first();

                    if ($orderdetails) {

                        $products[] = Products::find($orderdetails->product_id);
                    }
                }
                return view('InforCustomer.orderHistory', compact('user', 'delivery_informations', 'orders', 'products'));
            }
        }
        return view('InforCustomer.orderHistory', compact('user', 'delivery_informations'));
    }

    public function customerChangepassword()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect("/auth/login");
        }
        return view('InforCustomer.customerChangepassword', compact('user'));
    }
    public function saveaddress(Request $request)
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect("/auth/login");
        }
        $currentDateTime = Carbon::now();
       
        $user = DeliveryInformations::create([
            'name' =>   $request->input('name'),
            'phone' => $user->phone,
            'provides'=> $request->input('provides'),
            'district' => $request->input('district'),
            'wards' => $request->input('wards'),
            'apartmentNumber'=>$request->input('apartmentNumber'),
            'StreetNames'=>$request->input('streetNames'),
            'details'=> $request->input('details'),
            'date_order'=> $currentDateTime,
            
        ]);
        return redirect('/customerAddress')->with('success', 'Successfully change Address');
    }
}
