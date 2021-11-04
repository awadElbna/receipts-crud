<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DebitAccount;

class DebitAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DebitAccount::factory()->count(10)->create();
    }
}
