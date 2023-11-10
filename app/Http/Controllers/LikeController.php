<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = Like::create([
            "like_count" => 1,
            "id_product" => $request->id_product,
            "id_user" => $request->id_user,
        ]);
    
        return response()->json([
            "message" => "Like success",
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

    //show like
    public function showLike(Request $request)
    {
        $like = Like::where("id_product", $request->id_product)
            ->where("id_user", $request->id_user)
            ->first();
    
        return response()->json([
            "message" => "Unlike success",
        ]);
    }
    
}
