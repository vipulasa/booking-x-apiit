<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // create admin user
        \App\Models\Auth\User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),

            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => '+94777079697',
            'nic' => '9999999999v',
            'address' => 'Sample Address',
            'city' => 'Dehiwala',
            'state' => 'Western Province',
            'zip' => '10350',
            'country' => 'LK',
            'settings' => [],
            'role' => 'admin',
        ]);

        // create normal site user
        \App\Models\Auth\User::create([
            'name' => 'Site User',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),

            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => '+94777079697',
            'nic' => '9999999999v',
            'address' => 'Sample Address',
            'city' => 'Dehiwala',
            'state' => 'Western Province',
            'zip' => '10350',
            'country' => 'LK',
            'settings' => [],
            'role' => 'user',
        ]);

        \App\Models\Auth\User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
        ]);
    }
}
