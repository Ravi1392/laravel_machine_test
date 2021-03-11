<?php

namespace App\Http\Controllers;
// any valid date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// always modified right now
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// HTTP/1.1
header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
// HTTP/1.0
header("Pragma: no-cache");

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class Api_Controller extends Controller
{
  public function __construct()
    {
   date_default_timezone_set('Asia/Kolkata');
      $this->middleware(function ($request, $next) {

        $api_key = "d29985af97d29a80e40cd81016d939af";
         
        if ($api_key != $request->post('api_key')) {
            $d["status"] = "400";
            $d["msg"]    = "Entry Restricted !!".$request->post('api_key');
            return response()->json($d);
        }
            return $next($request);
       });
    }
    
function user_login(Request $res){
    
      $mobile=$res->mobile;
      $password=$res->password;
    
      $q = DB::table('user')->where('mobile',$mobile)->where('password',$password)->where('status','1')->where('deleted','1');
      if($q->count()==1)
      {
        $d['status']='200';
        $d['msg']='Login Succesfull';
        $d['id']=$q->first()->id;
        $d['name']=$q->first()->name;
        $d['email']=$q->first()->email;
        $d['mobile']=$q->first()->mobile;

      }else{
        $d['status']='400';
        $d['msg']='Login  Failed !';
        $d['id']="";
        $d['name']="";
        $d['email']="";
        $d['mobile']="";
      }

     return $d;
 }



function add_user(Request $req){
	 
      $name=$req->name;
      $mobile=$req->mobile;
      $email=$req->email;
      $address=$req->address;
      $designation=$req->designation;
      $password=$req->password;
      $cpassword=$req->cpassword;

      $q=DB::table('user')->where('email',$email)->where('deleted','1')->where('status','1');
       if($q->count()>=1)
      {
        $d['status']='400';
        $d['msg']="Email ID Already Register";
        return $d;
        exit;
       }

      $r=DB::table('user')->where('mobile',$mobile)->where('deleted','1')->where('status','1');
       if($r->count()>=1)
      {
        $d['status']='400';
        $d['msg']="Mobile Already Register";
        return $d;
        exit;
       }
      
      if($password != $cpassword){
      	$d['status']='400';
        $d['msg']="Password Not Match";
        return $d;
        exit;
      }
      $din=array(
        'name'=>$name,
        'mobile'=>$mobile,
        'address'=>$address,
        'email'=>$email,
        //designation send 1 or 2 
        'designation'=>$designation     
        );
        if(DB::table('user')->insert($din)){

        $d['status']='200';
        $d['msg']="Successfully register";
        $d['data']=$din;

      }else{

        $d['status']='400';
        $d['msg']="registration Failed";
        $d['data']=[];
      }
  return $d;
}

function user_list()
{
      $q=DB::table('user')->where('deleted','1')->where('status','1');
 
      if($q->count()>=1)
      {
   
      $d['status']='200';
      $d['msg']='Success';
      foreach($q->get() as $v){
      	if($v->designation==1){
         $desg="Admin";
      	}elseif ($v->designation==2) {
      	 $desg="User";	
      	}
        $d['user_list'][]=array(
          'id'=>$v->id,
          'name'=>$v->name,
          'email'=>$v->email,
          'mobile'=>$v->mobile,
          'address'=>$v->address,
          'description'=>$desg,
          'date'=>date('d/m/Y',strtotime($v->created_at))
         );
      }

    }else{
      $d['status']='400';
      $d['msg']='Users not found';
      $d['user_list']="";
     
    }

    return $d;

}


 
 
  
   
}
