<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login_index()
    {
        return view('log_in',['body'=>'reportsPage','title'=>'log_in']);
    }

    public function login(Request $request)
    {
        return $request;
        return redirect('dashboard');
    }
}
