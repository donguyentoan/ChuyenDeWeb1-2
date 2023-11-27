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
            // Xử lý trường hợp sản phẩm không tồn tại
            return response()->json(['error' => 'nofind product'], 404);
        }


        elseif (!$current_user) {
            // Nếu người dùng không đăng nhập
            // Kiểm tra trạng thái like từ session
            $likeStatus = session('like_status_' . $product->id, false);


            if ($likeStatus) {
                // Nếu trạng thái like là true, giảm giá trị like_count
                $product->like_count--;
                $product->save();
                session(['like_status_' . $product->id => false]);


                // Lưu trạng thái like mới vào session
                return response()->json(['like' => $product->like_count, 'likeStatus' => $likeStatus]);


            } else {
                // Nếu trạng thái like là false, tăng giá trị like_count
                $product->like_count++;
                $product->save();
                session(['like_status_' . $product->id => true]);


                // Lưu trạng thái like mới vào session
                return response()->json(['like' => $product->like_count, 'likeStatus' => $likeStatus]);
            }


        }


        else {
           
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
    }


    public function checkLikeStatus($id)
    {
        $current_user = auth()->user();


        // Kiểm tra xem người dùng đã thích sản phẩm hay chưa
        if (!$current_user) {
            $likeStatus = session('like_status_' . $id,false);


            return response()->json(['isLiked' => $likeStatus]);
        }
        else {
            $isLiked = Like::where('id_product', $id)
                ->where('id_user', auth()->id())
                ->exists();


            return response()->json(['isLiked' => $isLiked]);
        }
    }

    //delete like
    public function deleteLike($id)
    {
        $product = Products::find($id);
        if (!$product) {
            // Xử lý trường hợp sản phẩm không tồn tại
            return response()->json(['error' => 'nofind product'], 404);
        }
        

    }


}


   



