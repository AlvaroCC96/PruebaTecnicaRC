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

        $persmisions= ['file-upload',
                            'file-view',
                            'file-download',
                            'file-assing'];
        
        foreach ($persmisions as $permision_a) {

            $permision_a != 'file-assing' ? Permission::create(['name' => $permision_a])->assignRole($role1)->assignRole($role2) : 
                                            Permission::create(['name' => $permision_a])->assignRole($role1);
            
        }

    }
}
