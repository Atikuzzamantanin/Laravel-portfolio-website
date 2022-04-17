<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;

class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function onLogout(Request $request)
    {
        $request->session()->flush();
        return redirect ('/login');
    }

    function onLogin(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');
        $countValu = AdminModel::where('userName', '=', $user)->where('password', '=', $pass)->count();

        if($countValu==1){
            $request->session()->put('user', $user);
            return 1;
        }else{
            return 0;
        }
    }

  
}
