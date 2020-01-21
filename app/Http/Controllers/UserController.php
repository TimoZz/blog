<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @param null
     * @return 添加页面
     *
     */
    public function add(){
        return view('user/add');
    }


    /**
     * @param 注册信息
     * @return 对面的页面
     */
    public function addSubmit(Request $request){
        $input = $request->except('_token');
        $res = DB::table('user')->insert($input);
        if($res){
           //注册成功返回列表页
            return redirect(url('user/list'));
        }else{
            return back();
        }
    }


    public function userList(){
        $user = DB::table('user')->get();

        return view("user/userlist",compact('user'));
    }


    public function updateUser($id){
        $user = DB::table('user')->find($id);
        return view('user/userUpdate',compact('user'));
    }

    public function updateSubmit(Request $request){
        $input = $request->except('_token');
        $res = DB::table('user')
            ->where('id',$input['id'])
            ->update(['username'=>$input['username'],'password'=>$input['password']]);

        if($res){
            return redirect(url("user/list"));
        }else{
            return back();
        }
    }

    public function deleteUser($id){
        $res = DB::table('user')->delete($id);
        if ($res){
            return redirect(url("user/list"));
        }
    }
}
