<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

//注册页面路由
Route::get('admin/login', function (){
//    if (session('username')){
//        return redirect('admin/index');
//    }
    return view('admin/login');
});


Route::post('admin/login/submit','Admin\LoginController@login');

Route::get('admin/index', function (){
    if (session('username')){
        return view('admin/index');
    }else{
        return redirect('admin/login');
    }
});