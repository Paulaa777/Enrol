<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
  
        Role::create(['name' => 'Super_Admin'])
            ->givePermissionTo(Permission::all());
  
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
       
          /*
          $permissions = Permission::get();
          $role->syncPermissions($permissions);
          */
    }
}
