<?php

namespace App\Http\Controllers;

use App\Models\Plazo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlazoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plazos=Plazo::all();
        
        return view('plazos.index')
            ->with('plazos', $plazos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editor=User::orderBy('id')->with('posts')->get();

        return view('plazos.create')
            ->with('editor', $editor);
        
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
            'tipo_plazo'=>'required|string|max:255',
            'estado',
        ]);
      
        $validated=([
            'tipo_plazo'=> $request->tipo_plazo,
            'estado'=> $request->estado,      
            'editor'=> $request->editor=Auth::user()->id,
        ]);

        $tipo=DB::table('plazos')
            ->where('tipo_plazo','=',$request->tipo_plazo)
            ->whereNull('deleted_at')
            ->select('tipo_plazo', 'id')
            ->get();
        //dd($tipo ? true: false);
        
        /* Realizamos un SofDelete si existe un plazo de ese tipo creado previamente */
        if($tipo){
            foreach ($tipo as $t) {
                Plazo::find($t->id)->delete();
            }           
        }

        /*Creamos Plazo para Cambair Estado y Guardar REgistros de  BD */
        Plazo::create($validated);
        return redirect()->route('plazos.index')
            ->with('success', 'Plazo Editado con Éxito');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plazo  $plazo
     * @return \Illuminate\Http\Response
     */
    public function show(plazo $plazo)
    {
        Plazo::find($plazo);
        $c_editor=DB::table('users')
            ->where('id', '=', $plazo->editor)
            ->get();

         //   dd($c_editor);
        return view('plazos.show')
            ->with('plazo', $plazo)
            ->with(array('c_editor' => $c_editor));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plazo  $plazo
     * @return \Illuminate\Http\Response
     */
    public function edit(plazo $plazo)
    {
        Plazo::Find($plazo);
        $editor=User::orderBy('id')->with('posts')->get();

        return view('plazos.edit')
            ->with('plazo', $plazo)
            ->with('editor', $editor);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\plazo  $plazo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plazo $plazo)
    {
        
        /* ------ LOS PLAZOS NO SE PODRÁN EDITAR ------ */
        Plazo::where('id', $plazo->id); 
            return redirect()->back()
                ->with('alert','ATENCIÓN: Los Plazos no se pueden Editar.');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plazo  $plazo
     * @return \Illuminate\Http\Response
     */
    public function destroy(plazo $plazo)
    {
        Plazo::find($plazo->id)->delete();
        return redirect()->route('plazos.index')
            ->with('success','Plazo Eliminado Correctamente'); 
            
    }
    
}
