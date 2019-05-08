<?php

namespace App\Http\Controllers;

use App\Lps;
use App\Lps_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login_index()
    {
        return view('log_in',['body'=>'dashboard','title'=>'log_in']);
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

        return view('log_in',['body'=>'dashboard','title'=>'log_in','msg'=>'帳號或密碼錯誤']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/log_in');
    }

    public function test()
    {
        $lps=Lps::all()->where('status','已進場');
        return 100-count($lps);
    }

    public function account_index()
    {
        return view('account',['body'=>'account','title' => 'account']);
    }

    public function insert(Request $request)
    {
//        return $request;
        $lps_info=Lps_info::where('id',$request->ID)->get();
        if (!$lps_info->isEmpty()){
            return view('account',['body'=>'account','title' => 'account','msg'=>$request->ID.'此用戶已經申請過!!']);
        }else{
            Lps_info::create([
                'id'=>$request->ID,
                'name'=>$request->name,
                'mail'=>$request->email,
                'phone'=>$request->phone,
                'lp'=>$request->plate,
                'extension'=>$request->extension
            ]);

            Lps::create([
                'LP'=>$request->plate,
                'is_white'=>1,  //白名單
                'status'=>'未進場'
            ]);

            return view('account',['body'=>'account','title' => 'account','msg'=>$request->ID.'新增成功!!']);
        }
    }

    public function free_parking_space()
    {
        $lps=Lps::where('status','已進場')->get();
        return 110-count($lps);
    }
}
