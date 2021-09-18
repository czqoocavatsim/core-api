<?php

namespace Database\Seeders;

use App\Models\ApiAccount;
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
        if (config('app.env') == 'local') {
            ApiAccount::factory(10)->create();
        }
    }
}
