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
        for($i=0;$i<50;$i++){
            DB::table('lps')->insert([
                'LP'=>$this->random_lp(),
                'enter_t'=>date('YmdHis'),
                'out_t'=>date('YmdHis')+200,
                'is_white'=>random_int(0,1),
                'status'=>'已離開'
            ]);

            DB::table('lps')->insert([
                'LP'=>$this->random_lp(),
                'enter_t'=>date('YmdHis'),
                'is_white'=>random_int(0,1),
                'status'=>'已進入'
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
