<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
	
	public function login(Request $request) {

        if (session("login")) {

            return redirect(view("chooseTrain"));
        }
		
		$username = trim($request->input("username"));
		
		$password = md5(trim($request->input("password")));
		
		$user = User::where("username", $username)->where("password", $password)->get()->first();
		
		if ($user) {

            session(['login' => $username]);

            return array("status" => 1);
		
		} else {
			
			return array("status" => 0);
		}
		
	}
	
	public function register(Request $request) {


        if (session("login")) {

            return redirect(view("chooseTrain"));
        }
		
		$username = trim($request->input("username"));
		
		$password = md5(trim($request->input("password")));

		if (!$username || !$password) {

		    return array("status" => 0);
        }

		// 查看是否已经存在该用户

        $hasUser = User::where("username", $username)->count();

        if ($hasUser) {

            return array("status" => 2);

        } else {


            $user = new User();

            $user->username = $username;

            $user->password = $password;

            $user->save();

            return array("status" => 1);
        }

		
	}
	
	public function logout(Request $request) {

        $request->session()->forget('login');

        return redirect(route("login"));
	}

	public function changePassword(Request $request) {

	    if (!session("login")) {

	        return redirect(view("login"));
        }

	    $oldPassowrd = $request->input("oldPassword");

	    $newPassword = $request->input("newPassword");

	    // 查看数据库中旧密码是否正确

        $check = User::where("username", session("login"))->get()->first();

        if (($check->password) == md5($oldPassowrd)) {

            User::where("username", session("login"))->update(['password' => md5($newPassword)]);

            // 清除原来cookie重新登录

            $request->session()->forget('login');

            return array("status" => 1);
        } else {

            return array("status" => 0);
        }

    }
}
