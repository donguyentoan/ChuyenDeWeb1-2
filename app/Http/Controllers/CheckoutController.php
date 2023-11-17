<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Orders;


use Faker\Core\Number;
use App\Models\OrderDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryInformations;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    
    public function index()
    {
        return view('CheckoutOrder.CheckoutOrder');
    }
    public function infoOrder()
    {
        $filePath = public_path('json/provinces.json'); // Đường dẫn đến tệp JSON trong thư mục public
        $provinces = [];

        if (file_exists($filePath)) {
            $jsonContents = file_get_contents($filePath);

            // Đã lấy nội dung JSON, bạn có thể phân tích nó thành dữ liệu PHP
            $provinces = json_decode($jsonContents, true); // Chuyển đổi thành mảng kết hợp

            // Kiểm tra nếu chuyển đổi JSON thành công
            if ($provinces === null) {
                // Xử lý lỗi chuyển đổi JSON
                return response()->json(['error' => 'Failed to parse JSON'], 500);
            }
        } else {
            // Xử lý tệp không tồn tại
            return response()->json(['error' => 'File not found'], 404);
        }


        $filePath = public_path('json/districts.json'); // Đường dẫn đến tệp JSON trong thư mục public
        $districts = [];

        if (file_exists($filePath)) {
            $jsonContents = file_get_contents($filePath);

            // Đã lấy nội dung JSON, bạn có thể phân tích nó thành dữ liệu PHP
            $districts = json_decode($jsonContents, true); // Chuyển đổi thành mảng kết hợp

            // Kiểm tra nếu chuyển đổi JSON thành công
            if ($districts === null) {
                // Xử lý lỗi chuyển đổi JSON
                return response()->json(['error' => 'Failed to parse JSON'], 500);
            }
        } else {
            // Xử lý tệp không tồn tại
            return response()->json(['error' => 'File not found'], 404);
        }

        $filePath = public_path('json/wards.json'); // Đường dẫn đến tệp JSON trong thư mục public
        $wards = [];

        if (file_exists($filePath)) {
            $jsonContents = file_get_contents($filePath);

            // Đã lấy nội dung JSON, bạn có thể phân tích nó thành dữ liệu PHP
            $wards = json_decode($jsonContents, true); // Chuyển đổi thành mảng kết hợp

            // Kiểm tra nếu chuyển đổi JSON thành công
            if ($wards === null) {
                // Xử lý lỗi chuyển đổi JSON
                return response()->json(['error' => 'Failed to parse JSON'], 500);
            }
        } else {
            // Xử lý tệp không tồn tại
            return response()->json(['error' => 'File not found'], 404);
        }

        return view('CheckoutOrder.CheckoutInfor' , ['provinces' => $provinces , "districts" => $districts , "wards" => $wards]);
    }

    public function saveinfoOrder(Request $request)
    {
        $currentDateTime = Carbon::now();
        $futureDateTime = $currentDateTime->addMinutes(30);
       
            // Kiểm tra xem Request có dữ liệu từ biểu mẫu không
            if ($request->has('name') && $request->has('phone')) {
                // Lấy dữ liệu từ Request
                $name = $request->input('name');
                $phone = $request->input('phone');
                $province = $request->input('province');
                $district = $request->input('district');
                $ward = $request->input('ward');
                $apartmentNumber = $request->input('apartmentNumber');
                $streetNames = $request->input('streetNames');
                $details = $request->input('details');
                $timeDate = "2023-10-19 00:00:00";
                $datetime = $request->input('datetime');
                if(!empty($timeDate))
                {
                    $date_order = $futureDateTime;
                    $sql = "INSERT INTO delivery_informations (name, phone, provides, district, wards, apartmentNumber, streetNames, details, date_order)
                VALUES ('$name', '$phone', '$province', '$district', '$ward', '$apartmentNumber', '$streetNames', '$details', '$date_order')";
                }
                else
                {
                    $date_order = $datetime;
                    $sql = "INSERT INTO delivery_informations (name, phone, provides, district, wards, apartmentNumber, streetNames, details, date_order)
                VALUES ('$name', '$phone', '$province', '$district', '$ward', '$apartmentNumber', '$streetNames', '$details', '$date_order')";
                }
              
                  
                    DB::insert($sql);
                    
                    
                    return view('ReceivingInformation.receivingInformation');
            }
    
          
        

    }
    

    public function receivingIformation(Request $request)
    {

        $payment_method = $request->input('payment_method');
        $payment_total = $request->input('totalOrder');
        $miniCartData = $request->input('miniCartData');

        if(empty($payment_method))
        {
            Session::flash('error', 'Đã xảy ra lỗi. Vui lòng chọn phương thức thanh toán');
            return redirect()->back();
        }
        else
        {
            if($payment_method == "vnpay")
            {

                

                //  dd($miniCart);
                $order = new Orders();
                $newDeliveryInfo =  DeliveryInformations::all();
                
                foreach($newDeliveryInfo as $value)
                {
                    $order->customer_id = $value['id'];
                    $order->deliveryInformation_date = $value['date_order'];

                }

                foreach($miniCart as $item)
                {

                    $order->total_amount = ($item['quantity'] * $item['price']);
                   
                }
                $order->status = 0;

                $order->payment_method = 1;
                $order->save();
                foreach($miniCart as $item)
                {
                    $orderdetail = new OrderDetails(); 

                    $id = $item['id'];
                    $quantity = $item['quantity'];
                    $price = $item['price'];

                    $sql = "INSERT INTO orderdetails (order_id, product_id, quantity, price)
                    VALUES ('$order->id'  , $id , $quantity ,$price )";
                     DB::insert($sql);

                    
                }
                $number = $payment_total;
                $formattedNumber = number_format($number, 0, '.', ',');


                
                return view('payment.payment' , ["totalfm" => $formattedNumber , "total" => $payment_total]);
    
                
            }
            else{

                 $miniCart = json_decode(urldecode(request('miniCartData')), true);

                //  dd($miniCart);
                $order = new Orders();
                $newDeliveryInfo =  DeliveryInformations::all();
                
                foreach($newDeliveryInfo as $value)
                {
                    $order->customer_id = $value['id'];
                    $order->deliveryInformation_date = $value['date_order'];

                }

                foreach($miniCart as $item)
                {

                    $order->total_amount = ($item['quantity'] * $item['price']);
                   
                }
                $order->status = 0;

                $order->payment_method = 2;
                $order->save();
                foreach($miniCart as $item)
                {
                    $orderdetail = new OrderDetails(); 

                    $id = $item['id'];
                    $quantity = $item['quantity'];
                    
                    $price = $item['price'];

                    $formattedNumber = number_format($price, 0, ',', '.');

                    $sql = "INSERT INTO orderdetails (order_id, product_id, quantity, price)
                    VALUES ('$order->id'  , $id , $quantity ,$formattedNumber )";
                     DB::insert($sql);

                    
                }

               
                


                
                return view('OrderSuccess.orderSuccess');


            }

        }
        
       

        


    }
}
