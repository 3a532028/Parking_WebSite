<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CameraController extends Controller
{
    public function index(){
        return view('camera',['title'=>'camera','body'=>'camera']);
    }

    public function callapi(){
        $client=new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.5.17:8086/query?q=select+last(plate)%2C*+from+%22result%22&db=mydb&pretty=true',['verify' => false]);
        $response = json_decode($res->getBody()->getContents(), true);
        $dbname=$response['results'][0]['series'][0]['name'];
        $columns=$response['results'][0]['series'][0]['columns'][3];
        $values=$response['results'][0]['series'][0]['values'][0][3];
//        return $values[0];
        return view('camera',['title'=>'camera','body'=>'camera','columns'=>$columns,"values"=>$values]);
    }
}
