<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

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
                    $sql = "INSERT INTO DeliveryInformations (name, phone, provides, district, wards, apartmentNumber, streetNames, details, date_order)
                VALUES ('$name', '$phone', '$province', '$district', '$ward', '$apartmentNumber', '$streetNames', '$details', '$date_order')";
                }
                else
                {
                    $date_order = $datetime;
                    $sql = "INSERT INTO DeliveryInformations (name, phone, provides, district, wards, apartmentNumber, streetNames, details, date_order)
                VALUES ('$name', '$phone', '$province', '$district', '$ward', '$apartmentNumber', '$streetNames', '$details', '$date_order')";
                }
              
                    // Thực thi câu lệnh SQL INSERT
                    // DB::insert($sql);
                    
                    
                    return view('ReceivingInformation.receivingInformation');
            }
    
          
        

    }

    public function receivingIformation(Request $request)
    {

        $payment_method = $request->input('payment_method');
        $payment_total = $request->input('totalOrder');
        if(empty($payment_method))
        {
            Session::flash('error', 'Đã xảy ra lỗi. Vui lòng chọn phương thức thanh toán');
            return redirect()->back();
        }
        else
        {
            if($payment_method == "vnpay")
            {

               
                return view('payment.payment' , ["total" => $payment_total]);
    
                
            }
            else{
                return view('OrderSuccess/orderSuccess');
            }

        }
        
       

        


    }
}
