<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    

        User::create(['name' => 'Caissier Test', 'email' => 'caissier@test.com', 'password' => bcrypt('password'), 'role' => 'caissier']);
        User::create(['name' => 'Chargé Test', 'email' => 'charge@test.com', 'password' => bcrypt('password'), 'role' => 'charge_credit']);
        User::create(['name' => 'Admin Test', 'email' => 'admin@test.com', 'password' => bcrypt('password'), 'role' => 'admin']);

    }
}
