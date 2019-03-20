<?php

use Illuminate\Database\Seeder;

class LpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Taipei');
        for($i=0;$i<1;$i++){
            DB::table('lps')->insert([
                'LP'=>$this->random_lp(),
//                'enter_t'=>date('YmdHis'),
                'out_t'=>date('YmdHis'),  //離開時間
                'is_white'=>1,  //白名單
                'status'=>'未進場'
            ]);

            // 'status' => ['已進場','已過夜停車!','未進場','黑名單']

            DB::table('lps')->insert([
                'LP'=>$this->random_lp(),
                'enter_t'=>date('YmdHis'), //進場時間
                'is_white'=>1,   //白名單
                'status'=>'已進場'
            ]);

            DB::table('lps')->insert([
                'LP'=>$this->random_lp(),
                'out_t'=>date('YmdHis'),  //上次離開時間
                'is_white'=>0,   //黑名單
                'status'=>'黑名單'
            ]);
        }
        //
    }

    public function random_lp(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lps='';
        for($i=0;$i<3;$i++){
            $string = random_int(0,25);
            $lps=$lps.$characters[$string];
        }
        for ($j=0;$j<4;$j++){
            $lps=$lps.random_int(0,9);
        }
        return $lps;

    }
}
