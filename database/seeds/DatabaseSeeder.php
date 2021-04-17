<?php

use Illuminate\Database\Seeder;
use Database\Seeds\JeffAdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JeffAdminSeeder::class);
    }
}
