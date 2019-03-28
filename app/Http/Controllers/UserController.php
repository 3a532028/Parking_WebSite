<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login_index()
    {
        return view('log_in',['body'=>'reportsPage','title'=>'log_in']);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(
            [
                'name'=>$request->username,
                'password'=>$request->password
            ]
        )){
            return redirect('dashboard');
        }

        return view('log_in',['body'=>'reportsPage','title'=>'log_in','msg'=>'帳號或密碼錯誤']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/log_in');
    }
}
