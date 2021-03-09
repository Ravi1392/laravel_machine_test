<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Load Model
use App\Models\UserModels;

//  Without service container Direct fetch DB using Facade 

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
   
    function new_registration(){
      return view('register');
    }
    function regiter(Request $res){
      //laravel validation
          $res->validate([
            'name'=>'required',
            'mobile'=>'required|unique:user', //validation direct check in db 
            'email'=>'required|unique:user', //validation direct check in db
            'address'=>'required',
            'password' => 'required',
            'cpassword' => 'required_with:password|same:password' //Match Password and Config Password
        ]);
          $user =new UserModels;
          $user->name = $res->name;
          $user->email = $res->email;
          $user->mobile = $res->mobile;
          $user->designation = $res->designation;
          $user->address = $res->address;
          $user->password = $res->password;
          $user->save();
          return redirect('/')->with('success',"Registration Done");
          
    }
   
}

