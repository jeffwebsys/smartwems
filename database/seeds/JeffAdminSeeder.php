<?php

use Illuminate\Database\Seeder;
use App\User;

class JeffAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'password' => Hash::make('jrstesting'),
              'user_type' => 1];

          User::create($users);
    }
}
