<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{   //direct category page
    public function index(){
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }
    // category search
    public function categorySearch(Request $request){
        if($request->key  === null){
            return redirect()->route('admin#category');
        }
        $categories = Category::where('title','like','%'.$request->key.'%')->get();
        return view('admin.category.index',compact('categories'));
    }
    //category create page
    public function createPage(){
        return view('admin.category.create');
    }
    // category create
    public function categoryCreate(Request $request){
        $validator = $this->categoryValidation($request);
        if ($validator->fails()) {
            return redirect('admin/category/createPage')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $this->getCategoryData($request);
        Category::create($data);
        return redirect()->route('admin#category')->with(['created'=>'a category has been created']);

    }
    // delete category
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('admin#category')->with(['deleted'=>'a category has been deleted']);
    }
    //category update page
    public function categoryUpdatePage($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.update',compact('category'));
    }
    //category update
    public function categoryUpdate (Request $request){

        $validator = $this->categoryValidation($request);
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $data = $this->getCategoryData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('admin#category')->with(['updated'=>'A Category has been updated']);
    }
    // category validation
    private function categoryValidation($request){
        $rules = [
            'categoryName' => 'required|unique:categories,title,'.$request->categoryId,
            'categoryDescription' => 'required|min:5'
        ];
        $message = [
            'categoryName.uniques' => 'This category title exists. Try another one',
            'categoryName.required' => 'Please fill  category title',
            'categoryDescription.required' => 'Please fill category description',
        ];
        return  Validator::make($request->all(),$rules,$message);

    }
    // get category data
    private function getCategoryData($request){
        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription
        ];
    }

}
