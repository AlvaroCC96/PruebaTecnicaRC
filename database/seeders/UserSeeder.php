<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Alvaro Castillo (Admin)',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('admin')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Alvaro Castillo (Basic)',
            'email'=> 'basic@basic.com',
            'password' => bcrypt('basic')
        ])->assignRole('Admin');

    }
}
