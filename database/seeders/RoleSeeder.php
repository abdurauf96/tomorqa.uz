<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return collect([
            [
                'id'=>1,
                'name'=>'admin',
                'label'=>'Administrator',
            ],
            [
                'id'=>2,
                'name'=>'user',
                'label'=>'User',
            ],
            
        ])->each(function($data){
            \App\Models\Role::create([
                'id'=>$data['id'],
                'name'=>$data['name'],
                'label'=>$data['label'],
            ]);
        });
    }
}
