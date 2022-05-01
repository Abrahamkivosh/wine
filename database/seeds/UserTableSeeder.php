<?php
namespace Database\Seeders;
use App\User;
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
        factory(User::class,3)->create();
        $admin = User::where('email','admin@wine.com')->first();
        if ( ! $admin ) {
            # code...
            User::create([
                'name' => 'Admin',
                'email'=>'admin@wine.com',
                'phone'=>'0712345678',
                'isAdmin'=> '1',
                'email_verified_at' => now(),
                 'password' =>  bcrypt('12345678'),
                'remember_token' => Str::random(10),
                ]
            );
        }


    }
}
