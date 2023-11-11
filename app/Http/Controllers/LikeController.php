<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $current_user = Auth::user();
        $like = Like::create([
            "like_count" => 1,
            "id_product" => $request->id_product,
            "id_user" =>  $current_user->id,
        ]);
    
        return response()->json([
            "message    " => "Like success",
            "like" => $like,
        ]);
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
