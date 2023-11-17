<?php


namespace App\Http\Controllers;


use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Redirect;




class LikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $product = Products::find($id);
        $current_user = auth()->user();


        // Kiểm tra xem sản phẩm và người dùng có tồn tại không
        if (!$product) {
            // Xử lý trường hợp sản phẩm hoặc người dùng không tồn tại
            return response()->json(['error' => 'nofind product'], 404);
        }


        if (!$current_user) {
            // Xử lý trường hợp sản phẩm hoặc người dùng không tồn tại
            return response()->json(['error' => 'nofind user'], 404);
        }




        $user = $current_user->id;


        // Tìm kiếm like của người dùng cho sản phẩm này
        $existingLike = Like::where('id_product', $product->id)
            ->where('id_user', $user)
            ->first();


        if ($existingLike) {
            // Người dùng đã thích sản phẩm, xóa like và quan hệ trong bảng Likes
            $isLiked = false;
            $existingLike->delete();


            // Giảm giá trị của like_count trong bảng Products
            $product->like_count--;                 // <--- Giảm giá trị của like_count
            $product->save();


            //return Redirect::back();
            return response()->json(['like' => $product->like_count, 'isLiked' => $isLiked]);
        }
        else {
            // Người dùng chưa thích sản phẩm, tạo một like mới
            $isLiked = true;
            Like::create([
                'id_product' => $product->id,
                'id_user' => $user,
            ]);


            // Tăng giá trị của like_count trong bảng Products
            $product->like_count++;                 // <--- Tăng giá trị của like_count
            $product->save();
           
            //return Redirect::back();
            return response()->json(['like' => $product->like_count, 'isLiked' => $isLiked]);
        }
    }


    public function checkLikeStatus($id)
    {
        // Kiểm tra xem người dùng đã thích sản phẩm hay chưa
        $isLiked = Like::where('id_product', $id)
            ->where('id_user', auth()->id())
            ->exists();


        return response()->json(['isLiked' => $isLiked]);
    }
}


   


