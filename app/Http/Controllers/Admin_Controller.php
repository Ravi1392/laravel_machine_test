<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserModels;
use App\Models\EducationModel;
use App\Models\KnowlangModel;
use App\Models\TechnicalexpModel;
use App\Models\WorkexpModel;

class Admin_Controller extends Controller
{
    public function __construct()
    {
     date_default_timezone_set('Asia/Kolkata');
    }

    function dashboard()
    {
    	//user data get for table
      return view('dashboard',['users'=>DB::table('user')->orderBy('id','desc')->get()]);
    }
    function user_info($id){
      //using first method get specific user data for get data
      return view('view',['user_info'=>DB::table('user')->where('id',$id)->first()]);
    }
     function edit($id){
     	//using first method get specific user data for get data
    	return view('edit',['user_info'=>DB::table('user')->where('id',$id)->first()]);
    }
    function update(Request $res){
      //laravel validation
          $res->validate([
            'name'=>'required',
            'mobile'=>'required', //validation direct check in db 
            'email'=>'required', //validation direct check in db
            'address'=>'required',
            'gender' => 'required',
            
        ]);
          $user =UserModels::Find($res->id);
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
         
    foreach ($res->education as  $value) {

           $obj =EducationModel::Find($value['id']);
           $obj->field = $value['field'];
           $obj->university = $value['university'];
           $obj->year = $value['year'];
           $obj->percentage =$value['percentage'];
           $obj->updated_at = date('Y-m-d H:i:s');
           $obj->save();
        }
    foreach ($res->addmore as  $value) {

           $obj =WorkexpModel::Find($value['id']);
           $obj->company = $value['company'];
           $obj->designation = $value['designation'];
           $obj->from_date = date('Y-m-d',strtotime($value['from']));
           $obj->to_date = date('Y-m-d',strtotime($value['to']));
           $obj->updated_at = date('Y-m-d H:i:s');
           $obj->save();
        }
   
    foreach ($res->language as  $value) {

          $obj =KnowlangModel::Find($value['id']);
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

            if($value['prog_language']=="PHP"){
             $data = $value['PHP'];
            }elseif($value['prog_language']=="Mysql"){
             $data = $value['Mysql'];
            }elseif($value['prog_language']=="Laravel"){
              $data = $value['Laravel'];
            }elseif($value['prog_language']=="Codeigniter"){
              $data = $value['Codeigniter'];
            }
            
           $obj =TechnicalexpModel::Find($value['id']);
           $obj->prog_lang = $value['prog_language'];
           $obj->ability = $data;
           $obj->updated_at = date('Y-m-d H:i:s');
           $obj->save();
        }
        return redirect('dashboard')->with('success',"User Update Successfully");
          
    }

    function delete(request $req){
      $user = DB::table('user')->where('id',$req->id)->delete();
     
      return redirect('dashboard')->with('success','User Delete successfully.');

    }
}
