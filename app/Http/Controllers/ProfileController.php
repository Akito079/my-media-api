<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //admin home page
    public function index(){
        $account = User::where('id',Auth::user()->id)->first();
        return view('admin.profile.index',compact('account'));
    }
    //update profile
    public function updateProfile(Request $request){
       $this->validationCheck($request);
        $data = $this->getProfileData($request);
        User::where('id',Auth::user()->id)->update($data);
        return redirect()->route('dashboard')->with(['update'=>'Acoount Update Success']);
    }
    //chnangepassword page
    public function changePasswordPage(){
      $user = User::where('id',Auth::user()->id)->first();
      return view('admin.profile.changePassword',compact('user'));
    }
    //chnagepassword
    public function changePassword(Request $request){
        $this->checkpwValidation($request);
        $user = User::select('password')->where('id',Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if(Hash::check($request->oldPassword,$dbHashValue)){
            User::where('id',Auth::user()->id)->update(['password'=> Hash::make($request->newPassword)]);
            return back()->with(['success'=>'The Password has been changed']);
        }
        return back()->with(['failed'=>'The Old Password does not match']);
    }
    //get profile data
    private function getProfileData($request){
        return [
            'name' => $request->userName,
            'email'=> $request->userEmail,
            'phone' => $request->userPhone,
            'address' => $request->userAddress,
            'gender' => $request->userGender,
        ];
    }
    private function validationCheck($request){
        Validator::make($request->all(),[
            'userName' => 'required',
            'userEmail' => 'required|unique:users,email,'.$request->userId,
            'userPhone' => 'required',
            'userAddress' => 'required',
            'userGender' => 'required',
            ])->validate();
    }
    //check password validation
    private function checkpwValidation($request){
        $message = [
            'confirmPw.required' => 'Please Confirm your new password',
            'confirmPw.same' => 'Does not match with the new password',
        ];
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:5',
            'newPassword' => 'required|min:5',
            'confirmPw' => 'required|min:5|same:newPassword',
        ],$message)->validate();
    }
}
