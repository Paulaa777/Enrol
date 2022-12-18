<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|min:3|max:55',
            'email' => 'required|string|email|min:7|max:30',
            'password' => 'required|string|min:8|confirmed ',
            /*añado*/
            'apellidos' => 'required|string|min:7|max:100',
            /* 'nif' => 'required|string|max:10', */
            'nif' => ['required', 'regex:/(^[0-9]{8}\-?[TRWAGMYFPDXBNJZSQVHLCKE]{1}$)|(^[XYZ]{1}[0-9]{7}\-?[{1}TRWAGMYFPDXBNJZSQVHLCKE]$)/i'],
            'nacimiento' => 'required|before:now',
            /*'movil' => 'required|string|max:9',*/
            'movil'=>['required', 'regex:/^[1-9]{1}[0-9]{8}$/'],
            'direccion' => 'required|string|max:255',
            'municipio' => 'required|string|max:50',
            'provincia' => 'required|string|max:50',
            'codigo_postal' => 'required|numeric|min:1000|max:999999',
        
        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /*
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             //añado
             'apellidos' => $data['apellidos'],
             'nif'=> $data['nif'],
             'nacimiento' => $data['nacimiento'],
             'movil' => $data['movil'],
             'direccion'=> $data['direccion'],
             'municipio'=> $data['municipio'],
             'provincia'=> $data['provincia'],
             'codigo_postal'=>$data['codigo_postal'],
        ]);
        */


        $user= User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             /*añado*/
             'apellidos' => $data['apellidos'],
             'nif'=> $data['nif'],
             'nacimiento' => $data['nacimiento'],
             'movil' => $data['movil'],
             'direccion'=> $data['direccion'],
             'municipio'=> $data['municipio'],
             'provincia'=> $data['provincia'],
             'codigo_postal'=>$data['codigo_postal'],
        ]);

        $user->assignRole('User');       
        return $user;
    }
}
