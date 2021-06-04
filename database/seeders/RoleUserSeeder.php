<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\RoleUser::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
