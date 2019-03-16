<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InfluxdbController extends Controller
{
    //

    public function index()
    {
        return view('testinfluxdb');
    }

    public function testdb()
    {
        $client=new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.5.17:8086/query?q=select+*+from+%22test%22&db=LP',['verify' => false]);
        $response = json_decode($res->getBody()->getContents(), true);
        $dbname=$response['results'][0]['series'][0]['name'];
        $columns=$response['results'][0]['series'][0]['columns'];
        $values=$response['results'][0]['series'][0]['values'];
//        return $values[0];
        return view('testinfluxdb',['columns'=>$columns,"values"=>$values]);
    }
}
