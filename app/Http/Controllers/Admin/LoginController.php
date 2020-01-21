<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        $input = $request->except("_token");

        $rules = [
            'username' => 'bail|required|max:20',
            'password' => 'required|alpha_num',
            'captcha' => 'required|captcha'
        ];

        $message = [
            'username.required' => '用户名必填',
            'password.required' => '密码必填',
            'captcha.required' => '验证码必填',
            'captcha.captcha' => '验证码错误'
        ];

        $validator  = Validator::make($input, $rules, $message)->validate();

        $res = DB::table('user')->where("username",$input['username'])->first();
        if(!$res){
            $status = array(
                'status' => 1,
                'message' => '用户名不存在'
            );
        }else{
            if($input['password'] == $res->password){
                session(['username' =>$res->username]);
                $status = array(
                    'status' => 0,
                    'message' => '登录成功'
                );
            }else{
                $status = array(
                    'status' => 2,
                    'message' => '密码错误'
                );
            }
        }
        return json_encode($status);
    }
}
