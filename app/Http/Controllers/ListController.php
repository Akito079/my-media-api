<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{   //direct list page
    public function index(){
        $users = User::when(request('key'),function($query){
                $query->where('email','like','%'.request('key').'%');
                })->get();
        return view('admin.list.index',compact('users'));
    }
    public function deleteLists($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin#list')->with(['deleted'=>'an account has been deleted']);
    }
}
