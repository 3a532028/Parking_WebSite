<?php

namespace App\Http\Controllers;

use App\Lps;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index()
    {
        $lps=Lps::all();
//        return $lps;
        return view('index',['title'=>'index','body'=>'dashboard','lps'=>$lps]);
    }

}
