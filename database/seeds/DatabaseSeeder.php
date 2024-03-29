<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( UserTableSeeder::class ) ;
         $this->call( SupplierSeeder::class );
         $this->call( CategorySeeder::class );
         $this->call( SupplierSeeder::class );
         $this->call( ProductSeeder::class );
         $this->call( StockTableSeeder::class);
    }
}
