<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login_Controller extends Controller
{
	function index(){
    	return view('login');
    }
   function check(Request $request)
  {
  	//Login Admin with check validation and verify in daatabase

    $request->validate([
    'email' => 'required',
    'password' => 'required',
  ]);
  $email=$request->email;
  $password=$request->password;

  //check username and password in database

  $user = DB::table('user')->where('email',$email)->where('deleted','=','1')->where('password',$password);
  if($user->count() =='1')
  {
    $user=$user->first();
   //Login User Data Get in Session
    session(['name'=>$user->name,'admin_id' => $user->id,'designation'=>$user->designation]);

//Redirect To Admin Dashboard
if($user->designation=='1')
{
  return redirect('/dashboard');
}else{
	return redirect('/')->with('error','Invalid Email or Password !!');
}

  }else{ 
    return redirect('/')->with('error','Invalid Email or Password !!');
  }
  }

  function logout(Request $request)
  {
  	// use session_unset method for clear session or sign out Admin
  	
    session_unset();
    $request->session()->flush();
    return redirect('/')->with('success','Logged out successfully.');
  }

 
}
