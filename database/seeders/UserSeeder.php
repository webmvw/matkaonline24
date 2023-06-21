<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'matkaonline24',
        	'email' => 'matkaonline24@gmail.com',
        	'password' => bcrypt('maTKA@7878'),
        	'role_id' => '1',
            'status' => '1',
        ]);
    }
}
