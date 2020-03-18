<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,3)->create();

        App\User::create([
            'name' => 'Abraham',
            'email'=>'abrahamkivosh@gmail.com',
            'phone'=>'0707585566',
            'isAdmin'=> '1',
            'email_verified_at' => now(),
             'password' =>  bcrypt('@kivosh99@'),
            'remember_token' => Str::random(10),
            ]
        );
    }
}
