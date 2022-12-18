<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nombre' => 'Paula',
            'email' => 'as@as.as',
            'password' => bcrypt('12345678'),
            'apellidos' => 'González Seoane',
            'nif' => '22348877A',
            'nacimiento' => '2000-06-07',
            'movil' => '633777555',
            'direccion' => 'Avenida Siete Ocho, nº99 7ºE',
            'municipio' => 'Santiago de Compostela',
            'provincia' => 'A Coruña',
            'codigo_postal' => '17005',
        
        ]);
    
       // Role::create(['name' => 'User']);
        $user->assignRole('User');
    }
}
