<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lp;
use Carbon\Carbon;
class AdminlpsController extends Controller
{
    public function index(){

        return view('iswhite',['title'=>'iswhite','body'=>'iswhite']);
    }

    public function seletall(){
        $Lp_list=Lp::all();
        return $Lp_list;
    }

    public function sort($fun){
        switch ($fun)
        {
            case 'ent':
                $Lp_list1=collect(Lp::all()->where('status','已進場'));
                $Lp_list2=collect(Lp::all()->where('status','已過夜停車!'));
                $Lp_list3=Lp::all()->whereNotIn('status',['已進場','已過夜停車!']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);

                return $Lp_list;
                break;
            case 'unent':
                $Lp_list1=collect(Lp::all()->where('status','未進場'));
                $Lp_list2=collect(Lp::all()->where('status','已進場'));
                $Lp_list3=Lp::all()->whereNotIn('status',['未進場','已進場']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);
                return $Lp_list;
                break;
            case 'over':
                $Lp_list1=collect(Lp::all()->where('status','已過夜停車!'));
                $Lp_list2=collect(Lp::all()->where('status','黑名單'));
                $Lp_list3=Lp::all()->whereNotIn('status',['已過夜停車!','黑名單']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);
                return $Lp_list;
                break;
            case 'ban':
                $Lp_list1=collect(Lp::all()->where('status','黑名單'));
                $Lp_list2=collect(Lp::all()->where('status','已過夜停車!'));
                $Lp_list3=Lp::all()->whereNotIn('status',['黑名單','已過夜停車!']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);
                return $Lp_list;
                break;
            default:
                $Lp_list=Lp::all()->where('LP',$fun);
                return $Lp_list;
        }
    }

}
