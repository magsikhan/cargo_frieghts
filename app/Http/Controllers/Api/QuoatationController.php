<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserQuoatation;
use App\Models\PackegeServiceDetails;
use App\Models\PickAndDrop;
class QuoatationController extends Controller
{
    public function index(Request $request){

        $entries = request('entries',10);
        $user_quatations = UserQuoatation::where('status','like', "%".$request->search."%")
        ->where('user_id',$request->id)->paginate($entries);
        //dd($user_quatations);
        return response()->json($user_quatations,200);
    }

    public function getQuoatationDetail(Request $request){
        $qoutation = UserQuoatation::where('id',$request->id)->first();
        $user = User::where('id',$qoutation->user_id)->get()->first();
        $packege_service_details= PackegeServiceDetails::where('quote_id',$qoutation->id)->first();
        //dd($packege_service_details);
        $pick_drop_details= PickAndDrop::where('quote_id',$qoutation->id)->first();
        if($qoutation){
        $data = ['user'=>$user,'qoutation'=>$qoutation,'packege_service_details'=>$packege_service_details,'pick_drop_details'=>$pick_drop_details];     
        return response()->json($data,200);    
        }else{
        return response()->json(['message'=>'Something is wrong'],403);    
        }   

    }

    public function getQuations(Request $request){
        //dd($request->page);
        $quatations  = UserQuoatation::all();
        if($quatations){
        return response()->json($quatations,200);    
        }
        else{
        return response()->json(['message'=>'Something is wrong'],403);    
        }
    }
}
