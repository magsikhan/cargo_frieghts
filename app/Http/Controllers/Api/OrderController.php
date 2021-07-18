<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\User;
use App\Models\UserQuoatation;
use App\Models\PackegeServiceDetails;
use App\Models\PickAndDrop;

class OrderController extends Controller
{
    public function getUserOrderLog(Request $request){
        if($request->status == 'order-log'){
            $order_log = UserOrder::paginate($request->entries);
            if($order_log){
            return response()->json($order_log,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }   
        }
        $user  = User::where('id',$request->id)->get()->first();
        $user_order_log = UserOrder::where('user_id',$request->id)->paginate($request->entries);
        if($user){
        $data = ['user'=>$user,'user_order_log'=>$user_order_log];
        return response()->json($data,200);
        }else{
        return response()->json(['message'=>'Something is wrong'],403);
        }
    }

    public function getUserOrderDetails(Request $request){
        $user_order_log = UserOrder::where('id',$request->id)->first();
        $user = User::where('id',$user_order_log->user_id)->get()->first();
        $get_quoatation_id = UserQuoatation::where('user_id',$request->id)->get()->first();
        //dd($get_quoatation_id->id);
        $packege_service_details= PackegeServiceDetails::where('quote_id',$get_quoatation_id->id)->get();
        //dd($packege_service_details);
        $pick_drop_details= PickAndDrop::where('quote_id',$get_quoatation_id->id)->get();
        //dd($pick_drop_details);
        if($user_order_log){
        $data = ['user'=>$user,'user_order_log'=>$user_order_log,'packege_service_details'=>$packege_service_details,'pick_drop_details'=>$pick_drop_details];     
        return response()->json($data,200);    
        }else{
        return response()->json(['message'=>'Something is wrong'],403);    
        }
    }
}
