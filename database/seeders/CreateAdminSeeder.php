<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nombre' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'apellidos' => 'González Seoane',
            'nif' => '87654321B',
            'nacimiento' => '2000-02-22',
            'movil' => '766555444',
            'direccion' => 'Rúa Cuatro Cinco, nº7 5"A',
            'municipio' => 'Santiago de Compostela',
            'provincia' => 'A Coruña',
            'codigo_postal' => '17003',
        
        ]);
    
       // Role::create(['name' => 'Admin']);
        $user->assignRole('Admin');
     
       // $permissions = Permission::pluck('id','id')->all();
   
       // $user->syncPermissions($permissions);
    }
}
