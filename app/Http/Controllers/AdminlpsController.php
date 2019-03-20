<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lps;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\Constraint\IsFalse;

class AdminlpsController extends Controller
{
    public function index(){

        return view('iswhite',['title'=>'iswhite','body'=>'iswhite']);
    }

    public function seletall(){
        $Lp_list=Lps::all();
        return $Lp_list;
    }

    public function sort($fun){
        switch ($fun)
        {
            case 'ent':
                $Lp_list1=collect(Lps::all()->where('status','已進場'));
                $Lp_list2=collect(Lps::all()->where('status','已過夜停車!'));
                $Lp_list3=Lps::all()->whereNotIn('status',['已進場','已過夜停車!']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);

                return $Lp_list;
                break;
            case 'unent':
                $Lp_list1=collect(Lps::all()->where('status','未進場'));
                $Lp_list2=collect(Lps::all()->where('status','已進場'));
                $Lp_list3=Lps::all()->whereNotIn('status',['未進場','已進場']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);
                return $Lp_list;
                break;
            case 'over':
                $Lp_list1=collect(Lps::all()->where('status','已過夜停車!'));
                $Lp_list2=collect(Lps::all()->where('status','黑名單'));
                $Lp_list3=Lps::all()->whereNotIn('status',['已過夜停車!','黑名單']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);
                return $Lp_list;
                break;
            case 'ban':
                $Lp_list1=collect(Lps::all()->where('status','黑名單'));
                $Lp_list2=collect(Lps::all()->where('status','已過夜停車!'));
                $Lp_list3=Lps::all()->whereNotIn('status',['黑名單','已過夜停車!']);
                $Lp_list=$Lp_list1->merge($Lp_list2)->merge($Lp_list3);
                return $Lp_list;
                break;
            default:
                $Lp_list=Lps::all()->where('LP',$fun);
                return $Lp_list;
        }
    }

    public function unban($LP){
        $a=Lps::where('LP',$LP)->first();

        if ($a->status == '黑名單') {
            $a->status = '未進場';
            $a->is_white = 1;
            $a->save();
        }
        elseif ($a->status == '已過夜停車!'){
            $a->status = '已進場';
            $a->is_white = 1;
            date_default_timezone_set('Asia/Taipei');
            $a->enter_t=date('YmdHis');
            $a->save();
        }


        return redirect('iswhite');
    }

}
