<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfluxdbController extends Controller
{
    //

    public function index()
    {
        return view('testinfluxdb');
    }

    public function testdb()
    {
        http://192.168.5.17:8086/query?q=select+*+from+%22test%22&db=LP
    }
}
