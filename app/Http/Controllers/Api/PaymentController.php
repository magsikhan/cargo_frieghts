<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPayment;


class PaymentController extends Controller
{       
        public function getUserPaymentLog(Request $request){
        if($request->status == 'payment-log'){
        $payment_log = UserPayment::paginate($request->entries);
        if($payment_log){
        return response()->json( $payment_log,200);
        }else{
        return response()->json(['message'=>'Something is wrong'],403);
        }   
        }
        $user  = User::where('id',$request->id)->get()->first();
        $user_payment_log = UserPayment::where('user_id',$request->id)->paginate($request->entries);
        if($user){
        $data = ['user'=>$user,'user_payment_log'=>$user_payment_log];
        return response()->json($data,200);
        }else{
        return response()->json(['message'=>'Something is wrong'],403);
        }
       
        }
}
