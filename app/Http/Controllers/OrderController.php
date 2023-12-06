<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function index()
    {
        return view('OrderDetails.orderDetails');
    }
   


    public function deleteOrder($orderId) {
        // Xóa đơn hàng dựa trên ID
        DB::table('orders')->where('id', $orderId)->delete();
   
   
        // Chuyển hướng hoặc trả về một thông báo xác nhận xóa
        return redirect()->route('order.list')->with('success', 'Đơn hàng đã được xóa thành công.');  
      }
   


   
}
