<?php
namespace Database\Seeders;
use App\Cost;
use Illuminate\Database\Seeder;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cost::factory(20)->create();
    }
}
