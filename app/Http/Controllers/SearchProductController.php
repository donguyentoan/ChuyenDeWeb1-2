<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Manufactures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class SearchProductController extends Controller
{
    public function Result_Search(Request $request){
        $key = $request->input('name');


        $result = Products::where('name', 'like', '%' . $key . '%')->paginate(8);
        $result->appends(['name' => $key]);
     
       
            $categories = Categories::all();

          $manufacture = Manufactures::all();


     return view('Search', ['search' => $result , "manufacture" => $manufacture , "categories" => $categories ]);
    }
    public function Result_Search_Dashboard(Request $request){
        $key = $request->input('name');


        $result = Products::where('name', 'like', '%' . $key . '%')->paginate(8);
        $result->appends(['name' => $key]);
        $categories = Categories::all();
        $manufacture = Manufactures::all();


     return view('Dashboard.Products.ProductList', ['products' => $result , 'categories' => $categories , 'manufacture' => $manufacture]);
    }


    public function Result_Search_OrderCustomer(Request $request){
       
        $keyword = $request->input('name');


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
            ->where('products.name', 'like', '%' . $keyword . '%') // Điều kiện tìm kiếm theo tên sản phẩm
            ->orWhere('delivery_informations.name', 'like', '%' . $keyword . '%')
            ->orWhere('delivery_informations.details', 'like', '%' . $keyword . '%')
            ->orWhere('orders.payment_method', 'like', '%' . $keyword . '%') // Điều kiện tìm kiếm theo tên người nhận hàng          
            ->orWhere('delivery_informations.apartmentNumber', 'like', '%' . $keyword . '%') // Điều kiện tìm kiếm theo tên người nhận hàng
            ->orWhere('delivery_informations.StreetNames', 'like', '%' . $keyword . '%') // Điều kiện tìm kiếm theo tên người nhận hàng
            ->orWhere('delivery_informations.details', 'like', '%' . $keyword . '%') // Điều kiện tìm kiếm theo tên người nhận hàng
            // Điều kiện tìm kiếm theo tên người nhận hàng
            ->paginate(3);
            $categories = Categories::all();
            $manufacture = Manufactures::all();
     
       


     return view('Dashboard.OrderList', ['orders' => $result , 'categories' => $categories , 'manufacture' => $manufacture]);
    }
   
   
   


       
   


}
