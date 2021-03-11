<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Login_Controller;
use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\ProductAddMoreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('register');
// });

Route::get('/login',[Login_Controller::class,'index']);
Route::post('check',[Login_Controller::class,'check']);
Route::get('logout',[Login_Controller::class,'logout']);
Route::get('/',[UsersController::class,'new_registration']);
Route::post('regiter',[UsersController::class,'regiter']);


//Admin
Route::get('dashboard',[Admin_Controller::class,'dashboard']);
Route::get('view/{id}',[Admin_Controller::class,'user_info']);
Route::get('edit/{id}',[Admin_Controller::class,'edit']);
Route::post('update',[Admin_Controller::class,'update']);
Route::get('delete/{id}',[Admin_Controller::class,'delete']);


Route::get('addmore',[ProductAddMoreController::class,'addMore']);
Route::post('addmore',[ProductAddMoreController::class,'addMorePost'])->name('addmorePost');
