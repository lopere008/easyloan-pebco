<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Compte;
use App\Models\Transaction;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        if (!app()->environment(['local', 'testing'])) {
            return;
        }

        User::create(['name' => 'Chargé Test', 'email' => 'charge@test.com', 'password' => bcrypt('password'), 'role' => 'charge_credit']);
        User::create(['name' => 'Admin Test', 'email' => 'admin@test.com', 'password' => bcrypt('password'), 'role' => 'admin']);

    // Client éligible (compte ancien + actif)
        $client1 = User::create(['name' => 'Client Éligible', 'email' => 'client1@test.com', 'password' => bcrypt(Str::random(16)), 'role' => 'client']);
        $compte1 = Compte::create(['user_id' => $client1->id, 'code' => 'ELIGIBLE1', 'date_ouverture' => now()->subMonths(3)]);
        Transaction::create(['compte_id' => $compte1->id, 'type' => 'depot', 'montant' => 50000]);

    // Client NON éligible : compte trop récent
        $client2 = User::create(['name' => 'Client Récent', 'email' => 'client2@test.com', 'password' => bcrypt(Str::random(16)), 'role' => 'client']);
        Compte::create(['user_id' => $client2->id, 'code' => 'RECENT2', 'date_ouverture' => now()->subDays(5)]);

    // Client NON éligible : ancien mais sans transaction
        $client3 = User::create(['name' => 'Client Inactif', 'email' => 'client3@test.com', 'password' => bcrypt(Str::random(16)), 'role' => 'client']);
        Compte::create(['user_id' => $client3->id, 'code' => 'INACTIF3', 'date_ouverture' => now()->subMonths(6)]);
    }
    


}

