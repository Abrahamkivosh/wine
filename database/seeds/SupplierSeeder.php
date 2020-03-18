<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\User::create([
        //     'name' => 'Abraham Kivondo',
        //     'email' => 'abrtahamkivosh@gmail.com',
        //     'isAdmin' => true,
        //     'password' => bcrypt('12345678'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10)

        // ]);

        factory(App\Supplier::class,10)->create();
    }
}
