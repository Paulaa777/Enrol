<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Participante;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Preinscripcion;
use App\Models\Monitor;
use App\Models\Actividad;
use App\Models\Post;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()
            ->where('nombre', '!=','Super Admin');
        
            return view('users.index')
                ->with('users', $users);        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarioLogueado=User::find(Auth::id());
       
        
        if($usuarioLogueado->hasRole('Super_Admin')){
            
            $roles=Role::all()->pluck('name');

            return view('users.create')
                ->with('roles', $roles);
              
        } else {

            return view('users.create');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:20',
            'email' => 'required|string|email|min:7|max:30',
            'password' => 'required|string|min:8|confirmed',
            'apellidos' => 'required|string|min:7|max:30',
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

        $validated =([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'apellidos' => $request['apellidos'],
            'nif'=> $request['nif'],
            'nacimiento' => $request['nacimiento'],
            'movil' => $request['movil'],
            'direccion'=> $request['direccion'],
            'municipio'=> $request['municipio'],
            'provincia'=> $request['provincia'],
            'codigo_postal'=>$request['codigo_postal'],
        ]);

        $user=User::create($validated);
        
        $usuarioLogueado=User::find(Auth::id());
        
        if($usuarioLogueado->hasRole('Super_Admin')){
            
             $user->syncRoles($request->input('role'));
        

        }else{

            $user->syncRoles('User');  
            //$user->syncPermissions($user->role);
        }

        /*creado usuario creamos su participante */

        /*        
        $user_participante=new Participante;
        $user_participante->nombre_participante = $request->nombre_participante;      
        $user_participante->apellidos_participante = $request->apellidos_participante;
        $user_participante->dni_participante = $request->dni_participante;
        $user_participante->nacimiento_participante = $request->nacimiento_participante;
        $user_participante->movil_participante = $request->movil_participante;
        $user_participante->cod_user = User::id();
        $user_participante->save();
        */
       
       // dd( $user_participante);
        
        return redirect()->route('users.index')->with('success','Usuario Creado con Éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);        
        $usuarioLogueado=User::find(Auth::id());

        if($usuarioLogueado->hasRole('Super_Admin')){
            
            $roles=Role::all()->pluck('name');
            //dd($roles);
            return view('users.edit')
                ->with('user', $user)
                ->with('roles',$roles);
        }else{
            return view('users.edit')
                ->with('user', $user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:55',
            'email' => 'required|string|email|min:7|max:30',
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

        $validated =([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'apellidos' => $request['apellidos'],
            'nif'=> $request['nif'],
            'nacimiento' => $request['nacimiento'],
            'movil' => $request['movil'],
            'direccion'=> $request['direccion'],
            'municipio'=> $request['municipio'],
            'provincia'=> $request['provincia'],
            'codigo_postal'=>$request['codigo_postal'],
        ]);

        User::where('id', $id)->update($validated);
        
        $usuarioLogueado=User::find(Auth::id());
        
        if($usuarioLogueado->hasRole('Super_Admin')){
                $user=User::find($id);
                $user->syncRoles($request->input('role'));
        }
        
        return redirect()->route('users.show', $id)->with('success','Usuario Editado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','Usuario Eliminado con Éxito');
    }


    /* ----- PROFILE ----- */


    /**
     * Show the form for editing the profile
     */
    public function editProfile(){
     return view('users.editProfile');      

    }

    /**
     * Show the form for show the profile
     * @param  int  $id
    */
    public function showProfile($id){
        $id= Auth::user()->id;
        $user = User::find($id);
        return view('users.showProfile')->with("user", $user);
    }

    /**
     * Update the profile in storage
    */

    public function updateProfile(Request $request, $id){


        $request->validate([
            'nombre' => 'required|string|min:3|max:20',
            'email' => 'required|string|email|min:7|max:30',
            'apellidos' => 'required|string|min:7|max:30',
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

        $validated =([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'apellidos' => $request['apellidos'],
            'nif'=> $request['nif'],
            'nacimiento' => $request['nacimiento'],
            'movil' => $request['movil'],
            'direccion'=> $request['direccion'],
            'municipio'=> $request['municipio'],
            'provincia'=> $request['provincia'],
            'codigo_postal'=>$request['codigo_postal'],
        ]);

        User::where('id', $id)->update($validated);
        return redirect()->route('users.profile.show', $id)->with('success','Usuario Actualizado con Éxito');

    }

    
    /**
     * Show the form for editing the profile
    */
    public function editPasswordProfile(){
        return view('users.editPasswordProfile');      
   
    }

    /**
     * Update password profile in storage
    */

    public function updatePasswordProfile(Request $request, $id){


        $request->validate([
            'password' => 'required|string|min:8|confirmed', 
      ]);

        $validated =([
           'password' => Hash::make($request->password),
     ]);

        User::where('id', $id)->update($validated);
        return redirect()->route('users.profile.show', $id)->with('success','Password Editada con Éxito');

    }

    /**
     * Delete the profile in storage
    */
    public function destroyProfile($id){

        /*
        $id=Auth::user()->id;
        Auth::logout();
        $deleted=User::find($id)->delete();
      
        if($deleted){
            return view('/home');
        } else{
            Auth::login($id);
            return back()->with('status', 'Failed to delete your profile');
        }
       */ 

        Auth::user()->id;
        Auth::logout();
        User::find($id)->delete();
        return back()->with('status', 'Failed to delete your profile');
       
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajustes()
    {
        $user = User::find(Auth::id());
        
        return view('users.ajustes')
            ->with('user', $user);        

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function panelIndex()
    {
        $usuarioLogueado = User::find(Auth::id());
               
        $participantes=Participante::all()->count();
        $inscripciones=Inscripcion::all()->count();
        $preinscripciones=Preinscripcion::all()->count();
        $actividades=Actividad::All()->count();
        $monitores=Monitor::all()->count();
        $usuarios=User::all()->count();
        $posts=Post::all()->count();
        $roles=Role::all()->count();
        $permisos=Permission::all()->count();


        if($usuarioLogueado->hasRole('Super_Admin')){
       
            return view('/dashboard')
                ->with('participantes', $participantes)       
                ->with('inscripciones', $inscripciones)       
                ->with('preinscripciones', $preinscripciones)
                ->with('actividades', $actividades)       
                ->with('monitores', $monitores)   
                ->with('usuarios', $usuarios)    
                ->with('posts', $posts)     
                ->with('roles', $roles)    
                ->with('permisos', $permisos);        


        }elseif($usuarioLogueado->hasRole('Admin')){
       
            return view('/dashboard')
                ->with('participantes', $participantes)       
                ->with('inscripciones', $inscripciones)       
                ->with('preinscripciones', $preinscripciones)
                ->with('actividades', $actividades)       
                ->with('monitores', $monitores)   
                ->with('usuarios', $usuarios)    
                ->with('posts', $posts)
                ->with('usuarioLogueado', $usuarioLogueado);  

        }else{

            $participantes=Participante::where('cod_user','=',$usuarioLogueado->id)->count();
            $inscripciones=Inscripcion::where('c_usuario','=',$usuarioLogueado->id)->count();
            $preinscripciones=Preinscripcion::where('cod_usuario','=',$usuarioLogueado->id)->count();
            
            return view('/dashboard')
                ->with('participantes', $participantes)       
                ->with('inscripciones', $inscripciones)       
                ->with('preinscripciones', $preinscripciones)
                ->with('usuarioLogueado', $usuarioLogueado);  
        
        }
    }


    
}

