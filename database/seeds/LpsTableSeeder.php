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
        //
        $lps=\App\Lps::all();
        $lps->insert([
            'LP'=>str_random(3),
            'enter_t'=>date ("Y- m - d / H : i : s"),
            'out_t'=>'',
            'is_white'=>random_int(0,1),
            'status'=>''
        ]);

    }
}
