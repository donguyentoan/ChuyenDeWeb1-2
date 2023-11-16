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
        
        // Check if the product and user exist
        if (!$product || !$current_user) {
            // Handle the case where the product or user is not found
            return response()->json(['error' => 'Product or user not found'], 404);
        }
    
        $user = $current_user->id;
    
        // Check if the user has already liked the product
        $existingLike = Like::where('id_product', $product->id)
            ->where('id_user', $user)
            ->first();
    
        if ($existingLike) {
            // Handle the case where the user has already liked the product
            return response()->json(['error' => 'User already liked the product'], 400);
        }
    
        // Create a new like
        $like = Like::create([
            'like_count' => 1,
            'id_product' => $product->id,
            'id_user' => $user,
        ]);
    
        return response()->json(['message' => 'Product liked successfully']);
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
