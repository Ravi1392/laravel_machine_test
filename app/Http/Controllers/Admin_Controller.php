<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserModels;

class Admin_Controller extends Controller
{
    public function __construct()
    {

      $this->middleware(function ($request, $next) {
        //check Designation Admin is login or not
           if(session('designation') == '1')
           {
             $user = DB::table('user')->where('id',session('admin_id'))->where('designation',session('designation'));
             if($user->count()=='1')
             {
                 if($user->first()->status=='0')
                 {
                     return redirect('/')->with('error','Your account is suspended !!');
                 }
             }else{
               return redirect('/')->with('error','Your session is over on this device !!');
             }
           }else{
             return redirect('/')->with('error','Invalid Admin / Session is over!!');
           }
            return $next($request);
       });
    }

    function dashboard()
    {
    	//user data get for table
      return view('dashboard',['users'=>DB::table('user')->where('deleted','=','1')->where('id','!=',session('admin_id'))->get()]);
    }
     function edit($id){
     	//using first method get specific user data for get data
    	return view('edit',['user'=>DB::table('user')->where('id',$id)->first()]);
    }
     function update(Request $res){
        $res->validate([
            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $r= DB::table('user')->where('email',$res->email);
         if($r->count() >=1){
           if($r->first()->id == $res->id){
            $user =UserModels::Find($res->id);
		    $user->name = $res->name;
		    $user->email = $res->email;
		    $user->mobile = $res->mobile;
		    $user->address = $res->address;
		    $user->designation = $res->designation;
     
            $user->save();
          return redirect('dashboard')->with('success','User Update successfully.');
        }else{
          return redirect('edit/'.$res->id)->with('error','Email ID Already Register');
        }
      }else{   	
	      $user =UserModels::Find($res->id);
	      $user->name = $res->name;
	      $user->email = $res->email;
	      $user->mobile = $res->mobile;
	      $user->address = $res->address;
	      $user->designation = $res->designation;
	     
	      $user->save();
      return redirect('dashboard')->with('success',"User Update Successfully");
      }
    }
    function delete(request $req){
    	//using update query data delete change status 1 to 2 = Delete
      $user = DB::table('user')->where('id',$req->id);
      $user->update(['deleted'=>2]);
      return redirect('dashboard')->with('success','User Delete successfully.');

    }
}
