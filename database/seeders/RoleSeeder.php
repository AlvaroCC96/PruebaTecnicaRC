<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Basic']);

        Permission::create(['name' => 'admin.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.view'])->assignRole($role1);

        Permission::create(['name' => 'basic.view'])->assignRole($role2);
        Permission::create(['name' => 'basic.create'])->assignRole($role2);
    }
}
