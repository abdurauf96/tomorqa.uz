<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\User::create([
            'id'=>1,
            'name' => "Admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
