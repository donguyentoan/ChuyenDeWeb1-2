<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{

    public function like(Request $request, $id)
    {
    $product = Products::find($id);

    $current_user = auth()->user();

    // Kiểm tra xem sản phẩm và người dùng có tồn tại không
    if (!$product || !$current_user) {
       
        return response()->json(['error' => 'Không tìm thấy sản phẩm hoặc người dùng'], 404);
    }

    $user = $current_user->id;

    // Tìm kiếm like của người dùng cho sản phẩm này
    $existingLike = Like::where('id_product', $product->id)
        ->where('id_user', $user)
        ->first();

    if ($existingLike) {
        // Người dùng đã thích sản phẩm, xóa like và quan hệ trong bảng Likes
        $existingLike->delete();

        // Giảm giá trị của like_count trong bảng Products
        $product->like_count--;                 // <--- Giảm giá trị của like_count
        $product->save();

        // return response()->json(['like' => $product->like_count]);
        return Redirect::back();
    }

    // Người dùng chưa thích sản phẩm, tạo một like mới
    Like::create([
        'id_product' => $product->id,
        'id_user' => $user,
    ]);

    // Tăng giá trị của like_count trong bảng Products
    $product->like_count++;                 // <--- Tăng giá trị của like_count
    $product->save();
    // return response()->json(['like' => $product->like_count]);
    return Redirect::back();
    
}
}
