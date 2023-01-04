<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Icontroller;

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

Route::get('/', function () {
    return view('welcome');
});
//registration//
Route::get('/register', [Icontroller::class, 'register']);
Route::post('signupform',[Icontroller::class, 'signup_form']);
//login//
Route::get('login', [Icontroller::class, 'login']);
Route::post('loginform',[Icontroller::class, 'login_form']);
//for email send//
Route::get('send', [Icontroller::class, 'send']);

route::get('home',[Icontroller::class, 'home']);

//for running the project just login and run queue:work in terminal