<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        \App\User::create([
            'name' => 'Allen',
            'email'    => 'Allen@mail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
