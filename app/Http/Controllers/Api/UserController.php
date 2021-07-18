<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserQuoatation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
            
          if($request->search) {
            $entries = request('entries', 10);
            $users = User::where('first_name', 'like', "%" .$request->search. "%")->paginate($entries);
            return response()->json($users);
           } 
           if($request->status == "block_users"){
            //sdd('block');  
            $from   = request('from');
            $to     = request('to');
            $entries = request('entries', 10);
            $users = User::orderby('id','DESC')->where(function ($query) use($from, $to){
            if($from){
            $query->where('created_at', '>=', $from);
            }
            if($to){
            $query->where('created_at', '<=', $to);
            }        
            })->where('status','=',0)
            ->where('role_type_id', '!=' ,1)->paginate($entries);
            //dd($users);
            if($users){
            return response()->json($users,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
                }
            }
            elseif($request->status == "user-qoute-filter")
            {
            $entries = request('entries', 10);           
            $from   = request('from');
            $to     = request('to');
            $user_qoutation = UserQuoatation::orderby('id','DESC')->where(function ($query) use($from, $to){
            if($from){
            $query->where('created_at', '>=', $from);
            }
            if($to){
            $query->where('created_at', '<=', $to);
            }        
            })->where('user_id',$request->id)
            ->paginate($entries);
            //dd($users);
            //dd($user_qoutation);
            if($user_qoutation){
            return response()->json($user_qoutation,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
            }  

            $from   = request('from');
            $to     = request('to');
            $entries = request('entries', 10);
            $users = User::orderby('id','DESC')->where(function ($query) use($from, $to){
            if($from){
            $query->where('created_at', '>=', $from);
            }
            if($to){
            $query->where('created_at', '<=', $to);
            }          
            })->where('status','=',1)
            ->where('role_type_id', '!=' ,1)->paginate($entries);
            if($users){
            return response()->json($users,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        { 
          //dd($request->all());    
        $validataData =   $request->validate([
            'first_name'  =>'required',
            'email'       =>'required|email',
            'password'    =>'required',
            'confirm_pass'=>'required',
            'phone_no'    =>'required',
            'country'     =>'required',
            'city'        =>'required',
            'profile'     =>'image', 
             ]);

            if($request->user_type == 'Bussniss'){
            $imageName = time().'.'.$request->profile->extension();  
            $request->profile->move(public_path('uploads'), $imageName);

            $data = array(
            'reg_date'    =>date('Y-m-d H:i:s'),
            'user_type'   =>$request->user_type,
            'first_name'  =>$request->first_name,
            'last_name'   =>$request->last_name,
            'email'       =>$request->email,
            'password'    =>Hash::make($request->password),
            'phone_no'    =>$request->phone_no,
            'address'     =>$request->address,
            'country'     =>$request->country,
            'city'        =>$request->city,
            'post_code'   =>$request->post_code,
            'profile'     =>$imageName,
            'company_no'  =>$request->company_no,
            'company'     =>$request->company,
            'vat_no'      =>$request->vat_no,
            'dept_email'  =>$request->account_email  
            );

            $result  = User::create($data);
            if($result){
            return response()->json(['message'=>'User created successfylly'],200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
            }
             
            if($request->user_type == 'Customer'){
            $imageName = time().'.'.$request->profile->extension();  
            $request->profile->move(public_path('uploads'), $imageName);
            $data = array(
            'reg_date'    =>date('Y-m-d H:i:s'),
            'user_type'   =>$request->user_type,
            'first_name'  =>$request->first_name,
            'last_name'   =>$request->last_name,
            'email'       =>$request->email,
            'post_code'   =>$request->post_code,
            'password'    =>Hash::make($request->password),
            'phone_no'    =>$request->phone_no,
            'profile'     =>$imageName,
            'address'     =>$request->address,
            'country'     =>$request->country,
            'city'        =>$request->city,
            );
            $result  = User::create($data);
            if($result){
            return response()->json(['message'=>'User created successfylly'],200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
           }  
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
        {
            //dd($request->all());
            if($request->status == "getUserQuatation"){  
            $user = User::where('id',$id)->get();
            $user_qoutation = UserQuoatation::orderby('id','DESC')->where('user_id',$id)->paginate($request->entries); 
            if($user_qoutation){
            $data = ['user'=>$user, 'user_qoutation'=>$user_qoutation];
            return response()->json($data,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
        }
            $user = User::where('id',$id)->first();
            if($user){
            return response()->json($user,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {
            $user = User::where('id',$id)->first();
            if($user){
            return response()->json($user,200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
           }
        }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
            //dd($request->all());
            if($request->status == 'block'){
                $status['status'] = 0;
                $user  = User::where('id',$id)->update($status);
                if($user){
                    return response()->json(['message'=>'User blocked successfylly'],200);
                }else{
                    return response()->json(['message'=>'Something is wrong'],403);
                }
                }
                if($request->status == 'unblock'){
                $status['status'] = 1;
                $user  = User::where('id',$id)->update($status);
                if($user){
                return response()->json(['message'=>'User unblocked successfylly'],200);
                }else{
                return response()->json(['message'=>'Something is wrong'],403);
                }
                }

            elseif($request->file() == null){
            $request->validate([
            'first_name'  =>'required',
            'email'       =>'required|email',
            'phone_no'    =>'required',
            'country'     =>'required',
            'city'        =>'required', 
             ]);    
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
            $user  = User::where('id',$id)->update($data);
            if($user){
            return response()->json(['message'=>'User updated successfylly'],200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }    
            }
            elseif($request->profile){
            $request->validate([
            'first_name'  =>'required',
            'email'       =>'required|email',
            'phone_no'    =>'required',
            'country'     =>'required',
            'city'        =>'required', 
            ]);    
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
            $user  = User::where('id',$id)->update($data);
            if($user){
            return response()->json(['message'=>'User updated successfylly'],200);
            }else{
            return response()->json(['message'=>'Something is wrong'],403);
            }
         }

        
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
