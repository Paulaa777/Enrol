<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
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

        
        // create permissions
        Permission::create(['name' => 'edit_posts']);
        Permission::create(['name' => 'delete_posts']);
        Permission::create(['name' => 'show_posts']);
        Permission::create(['name' => 'create_posts']);
  
          
        /* 
        $role = Role::all()->pluck('name');

        $role->hasRole('Super_Admin')->givePermissionTo(Permission::all());
  
        $$role->hasRole('Admin')->givePermissionTo(['create_posts','edit_posts']);
  
        $role->hasRole('User')->givePermissionTo('publish_posts');
        */ 
         
    }
}
