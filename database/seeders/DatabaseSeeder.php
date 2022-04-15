<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::firstOrCreate([
            'username' => 'hilsonxhero',
            'email' => 'hilsonxhero.me@gmail.com',
            'phone' => '09010105397',
            'is_superuser' => 1,
            'password' => Hash::make("amir3090@%A")
        ])->markEmailAsVerified();
    }
}
