<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewPost;



class NewPostController extends Controller
{
    //
    public function index(){
        $newPost  = NewPost::all();

        return view('Post.newpost', compact('newPost'));
    }
    public function detailPost($id){

        $detailPost = NewPost::find($id);

        return view('Post.detailPost', compact('detailPost'));
    }
}
