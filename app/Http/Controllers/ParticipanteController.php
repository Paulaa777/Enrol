<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarioLogueado=User::find(Auth::id());
       
        //dd($usuarioLogueado);
        //dd($usuarioLogueado->hasAnyRole(['Admin', 'Super_Admin']));

        if($usuarioLogueado->hasAnyRole(['Admin', 'Super_Admin'])){

            $participantes=Participante::all();            
            return view('participantes.index')->with('participantes', $participantes);

        }else{
            
            $participantes=Participante::where('cod_user','=', $usuarioLogueado->id)->get();
            return view('participantes.index')->with('participantes', $participantes);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod_user=User::orderBy('id')->with('participantes')->get();
        // dd($cod_user);
        return view('participantes.create')->with(array('cod_user'=>$cod_user));
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
        //$validated=$request->validate([
            'nombre_participante' =>'required|string|max:55',      
            'apellidos_participante'=>'required|string|max:100',
            /*'dni_participante'=>'required|string|max:10',*/
            'dni_participante' => ['required', 'regex:/(^[0-9]{8}\-?[TRWAGMYFPDXBNJZSQVHLCKE]{1}$)|(^[XYZ]{1}[0-9]{7}\-?[{1}TRWAGMYFPDXBNJZSQVHLCKE]$)/i'],
            'nacimiento_participante' =>'required|before:now',
           /* 'movil_participante'=>'required|string|max:9',*/
            'movil_participante'=>['required', 'regex:/^[1-9]{1}[0-9]{8}$/'],
            'cod_user',
        ]);
        
       
        $participante= new Participante;

        $participante->nombre_participante = $request->nombre_participante;      
        $participante->apellidos_participante = $request->apellidos_participante;
        $participante->dni_participante = $request->dni_participante;
        $participante->nacimiento_participante = $request->nacimiento_participante;
        $participante->movil_participante = $request->movil_participante;
        $participante->cod_user = $request->cod_user;
        $participante->save();
        
        //dd($validated);
        //Participante::created($validated);
        return redirect()->route('participantes.index')->with('success','Participante Creado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function show(Participante $participante)
    {
        Participante::find($participante);
        return view('participantes.show')->with('participante', $participante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function edit(Participante $participante)
    {
        Participante::find($participante);
        $cod_user=User::orderBy('id')->with('participantes')->get();
        // dd($cod_user);
        
        return view('participantes.edit')->with(array('cod_user'=>$cod_user))->with('participante', $participante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participante $participante)
    {
        $validated=$request->validate([
            'nombre_participante' =>'required|string|max:55',      
            'apellidos_participante'=>'required|string|max:100',
            /*'dni_participante'=>'required|string|max:10',*/
            'dni_participante' => ['required', 'regex:/(^[0-9]{8}\-?[TRWAGMYFPDXBNJZSQVHLCKE]{1}$)|(^[XYZ]{1}[0-9]{7}\-?[{1}TRWAGMYFPDXBNJZSQVHLCKE]$)/i'],
            'nacimiento_participante' =>'required|before:now',
            /*'movil_participante'=>'required|string|max:9',*/
            'movil_participante'=>['required', 'regex:/^[1-9]{1}[0-9]{8}$/'],
            'cod_user',
        ]);

        //dd($validated);
        Participante::where('id',$participante->id)->update($validated);
        return redirect()->route('participantes.index')->with('success','Participante Actualizado con Éxito');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participante $participante)
    {
        Participante::find($participante->id)->delete();
        return redirect()->route('participantes.index')->with('success','PArticipante Eliminado Correctamente');
    }

}
