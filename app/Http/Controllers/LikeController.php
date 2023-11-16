<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Products;

class LikeController extends Controller
{
    public function like($id)
    {
       $product = Products::find($id);
       $current_user = auth()->user();
       $user = $current_user->id;
         
        $like = Like::create([
            "like_count" => 1,
            "id_product" => $product->id,
            "id_user" => $user,
        ]);
        
        $like = Like::find($id);
    }
    
    public function unlike(Request $request)
    {
        $like = Like::where("id_product", $request->id_product)
            ->where("id_user", $request->id_user)
            ->first();
    
        $like->delete();
    
        return response()->json([
            "message" => "Unlike success",
        ]);
    }

    // get like count
    public function getLikeCount(Request $request , $id_product)
    {
        $like = Like::where("id_product", $id_product)->count();
        return response()->json([
            "like" => $like,
        ]);
    }
  
    
}
