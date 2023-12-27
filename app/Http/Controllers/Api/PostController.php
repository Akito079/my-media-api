<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{   //get all post
    public function allPost(){
        $post = Post::select('posts.*','categories.title as category_title')
                ->leftJoin('categories','posts.category_id','categories.id')
                ->get();
        return response()->json([
            'posts' => $post,
            'status' => 'success',
        ]);
    }
    //search posts
    public function postSearch(Request $request){
        $post = Post::select('posts.*','categories.title as category_title')
                ->join('categories','posts.category_id','categories.id')
                ->orWhere('posts.title','like','%'.$request->key.'%')
                ->orWhere('categories.title','like','%'.$request->key.'%')
                ->get();
       return response()->json([
        'searchData' => $post,
       ]);
    }
    public function postDetail(Request $request){
        $id = $request->postId;
        $post = Post::where('id',$id)->first();
        return response()->json([
            'posts' => $post,
        ]);
    }
}
