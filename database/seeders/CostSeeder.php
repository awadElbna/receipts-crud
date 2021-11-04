<?php

namespace Database\Seeders;
use App\Models\Cost;
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
        Cost::factory()->count(10)->create();
    }
}
