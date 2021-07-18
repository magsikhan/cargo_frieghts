<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Prophecy\Call\Call;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $login_cardtional = array(
            'email'    => $request->email,
            'password' => $request->password
        );
        if (auth::attempt($login_cardtional)) {
            $token = auth()->user()->createToken('asdasd')->accessToken;
            $data = ['user' => auth()->user()->id, 'token' => $token];
            return response()->json($data, 200);
        } else {
            return response()->json(['message' => 'username or password is invalid'], 401);
        }
    }

    public function loginUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user) {
            return response()->json($user,200);
        } else {
            return response()->json(['message' => 'Somthing is wrong'],403);
        }
    }

    public function viewProfile(Request $request)
    {
        //dd($request->all());
        $user = User::where('id', $request->id)->first();
        //dd($user);
        if ($user) {
            return response()->json($user,200);
        } else {
            return response()->json(['message' => 'Somthing is wrong'],403);
        }
    }

    public function checkPass(Request $request)
    {
        $user      = User::where('id', $request->id)->get('password')->first();
        $user_pass = $user->password;
        //dd(Crypt::decrypt($user_pass));
        $pass_decript = Crypt::decrypt($user_pass);
        // dd($pass_decript);
        if ($request->password == $pass_decript) {
            return response()->json($pass_decript);
        } else {
            return response()->json(['message' => 'Currant password not match'],403);
        }
    }

    public function changePass(Request $request)
    {
        $chnagePass['password'] =  Crypt::encrypt($request->password);
        $user = User::where('id', $request->id)->update($chnagePass);
        if ($user) {
            return response()->json(['message' => 'Password updated successfully'],200);
        } else {
            return response()->json(['message' => 'Somthing is wrong'],403);
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name'  =>'required',
            'email'       =>'required|email',
            'phone_no'    =>'required',
            'country'     =>'required',
            'city'        =>'required', 
            ]);
            if($request->file() == null){
            $data = array(
            'first_name'  =>$request->first_name,
            'last_name'   =>$request->last_name,
            'email'      =>$request->email,
            'phone_no'    =>$request->phone_no,
            'address'     =>$request->address,
            'city'        =>$request->city,
            'country'     =>$request->country,
            'post_code'   =>$request->post_code,
            );
            $user  = User::where('id',$request->id)->update($data);
            if($user){
            return response()->json(['message'=>'Profile updated successfylly'],200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }    
            }
            if($request->profile){
            $imageName = time().'.'.$request->profile->extension();  
            $request->profile->move(public_path('uploads'), $imageName);    
            $data = array(
            'first_name'  =>$request->first_name,
            'last_name'   =>$request->last_name,
            'email'      =>$request->email,
            'phone_no'    =>$request->phone_no,
            'address'     =>$request->address,
            'city'        =>$request->city,
            'country'     =>$request->country,
            'post_code'   =>$request->post_code,
            'profile'     =>$imageName
            );
            $user  = User::where('id',$request->id)->update($data);
            if($user){
            return response()->json(['message'=>'Profile updated successfylly'],200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
         }
    }

        public function forgotPassword(Request $request){
           $user = User::whereEmail($request->email)->first();
           if($user){
            Mail::to($request->email)->send(new ForgotPasswordMail());
            return response()->json(['message'=>'Forgot password link sent to your register email'],200);
           }else{
            return response()->json(['message'=>'Sorry! email does not match our record'],403);
           } 
           
        }

        public function changePassword(Request $request){
            $newPassword['password'] = Hash::make($request->newPass);
            $user = User::where('email',$request->email)->first();
            if($user){
            User::where('email',$request->email)->update($newPassword);
            return response()->json(['message'=>'Password updated successfully'],200);    
            }else{
            return response()->json(['message'=>'Sorry! email does not match our record'],403);       
            }
               
        }
}
