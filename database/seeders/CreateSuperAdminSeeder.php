<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nombre' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('12345678'),
            'apellidos' => 'Super Admin',
            'nif' => '12345678A',
            'nacimiento' => '2000-10-11',
            'movil' => '677999888',
            'direccion' => 'Avenida Uno Dos, nº3 2"B',
            'municipio' => 'Santiago de Compostela',
            'provincia' => 'A Coruña',
            'codigo_postal' => '17002',
        
        ]);
    
       // Role::create(['name' => 'Super_Admin']);
        $user->assignRole('Super_Admin');
     
        $permissions = Permission::all();
        $user->syncPermissions($permissions);
     
        
    }
}
