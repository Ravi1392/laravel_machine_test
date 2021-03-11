<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Load Model
use App\Models\UserModels;
use App\Models\EducationModel;
use App\Models\KnowlangModel;
use App\Models\TechnicalexpModel;
use App\Models\WorkexpModel;

//  Without service container Direct fetch DB using Facade 

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
   public function __construct()
    {
     date_default_timezone_set('Asia/Kolkata');
    }
   
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
            'gender' => 'required',
            
        ]);
          $user =new UserModels;
          $user->name = $res->name;
          $user->email = $res->email;
          $user->mobile = $res->mobile;
          $user->gender = $res->gender;
          $user->address = $res->address;
          $user->pre_loc = $res->pre_loc;
          $user->current_ctc = $res->current_ctc;
          $user->expected_ctc = $res->expected_ctc;
          $user->notice_period = $res->notice_period;
          $user->created_at = date('Y-m-d H:i:s');
          $user->save();
          $data = $user->id;
         
         foreach ($res->education as  $value) {

        
           $obj = new EducationModel();
           $obj->user_id = $data;
           $obj->field = $value['field'];
           $obj->university = $value['university'];
           $obj->year = $value['year'];
           $obj->percentage =$value['percentage'];
           $obj->created_at = date('Y-m-d H:i:s');
           $obj->save();
        }
         foreach ($res->addmore as  $value) {

         
           $obj = new WorkexpModel();
           $obj->user_id = $data;
           $obj->company = $value['company'];
           $obj->designation = $value['designation'];
           $obj->from_date = date('Y-m-d',strtotime($value['from']));
           $obj->to_date = date('Y-m-d',strtotime($value['to']));
           $obj->created_at = date('Y-m-d H:i:s');
           $obj->save();
        }
   
    foreach ($res->language as  $value) {

           $obj = new KnowlangModel();
           $obj->user_id = $data;
           $obj->language = $value['language'];
            if(empty($value['read'])){
             $read = "";
            }else{
                $read = $value['read'];
            }

           $obj->read_lang = $read;

            if(empty($value['write'])){
             $write = "";
            }else{
                $write = $value['write'];
            }
           $obj->write_lang = $write;

           if(empty($value['speak'])){
             $speak = "";
            }else{
                $speak = $value['speak'];
            }
           $obj->speak = $speak;
           $obj->created_at = date('Y-m-d H:i:s');
           $obj->save();
        }
   
    foreach ($res->prog_language as  $value) {

           // print_r($value);
           $obj = new TechnicalexpModel();
           $obj->user_id = $data;
           $obj->prog_lang = $value['prog_language'];
           $obj->ability = $value['php'];
           $obj->created_at = date('Y-m-d H:i:s');
           $obj->save();
        }
  
          return redirect('/')->with('success',"Registration Done");
          
    }
   
}

