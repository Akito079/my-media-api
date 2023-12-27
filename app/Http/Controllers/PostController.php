<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{   //direct post page
    public function index(){
        $posts = Post::select('posts.*','categories.title as category')
                ->leftJoin('categories','posts.category_id','categories.id')
                ->get();
        return view('admin.posts.index',compact('posts'));
    }
    //direct post create page
    public function createPostPage(){
        $categories = Category::get();
        return view('admin.posts.create',compact('categories'));
    }
    //create posts
    public function createPost(Request $request){
       $validator = $this->postValiodationCheck($request);
       if($validator->fails()){
        return back()->withErrors($validator)->withInput();
       }
       $data = $this->getPostData($request);
       if($request->hasFile('postImage')){
           $file = $request->file('postImage');
           $fileName = uniqid().'_'.$file->getClientOriginalName();
           $file->move(public_path().'/postImage',$fileName);
           $data['image'] =$fileName;
       }
       Post::create($data);
       return redirect()->route('admin#post');
    }
    //delete posts
    public function deletePost($id){
        $postData = Post::where('id',$id)->first();
        $dbImageName = $postData->image;
        if(File::exists(public_path().'/postImage/'.$dbImageName)){
           File::delete(public_path().'/postImage/'.$dbImageName);
        }
        Post::where('id',$id)->delete();
        return back();
    }
    //update post page
    public function updatePostPage($id){
        $categories = Category::get();
        $post = Post::select('posts.*','categories.title as category')
                ->leftJoin('categories','posts.category_id','categories.id')
                ->where('posts.id',$id)->first();
        return view('admin.posts.update',compact('categories','post'));
    }
    //update posts
    public function updatePost(Request $request){

        $validator = $this->postValiodationCheck($request);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
       $data = $this->getPostData($request);
       if($request->hasFile('postImage')){
            $file = $request->file('postImage');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            //get image from db
            $postData = Post::where('id',$request->postId)->first();
            $dbImage = $postData->image;
            //delete local storage image
            if(File::exists(public_path().'/postImage/'.$dbImage)){
                File::delete(public_path().'/postImage/'.$dbImage);
            }
            //update image
            $file->move(public_path().'/postImage',$fileName);
            $data['image'] = $fileName;
       }
        Post::where('id',$request->postId)->update($data);
        return redirect()->route('admin#post');
    }
    private function postValiodationCheck($request){
        $rules = [
            'postTitle'=> 'required',
            'postDescription' => 'required|min:6',
            'postImage' => 'mimes:jpg,jpeg,png,webp',
            'categoryId' => 'required',
        ];
        return Validator::make($request->all(),$rules);
    }
    private function getPostData($request) {
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'category_id' => $request->categoryId,
        ];
    }
}
