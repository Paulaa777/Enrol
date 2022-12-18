<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Participante;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Plazo;
use App\Models\Preinscripcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioLogueado=User::find(Auth::id());
        
        if($usuarioLogueado->hasAnyRole(['Admin', 'Super_Admin'])){
                        
            $inscripciones=DB::table('inscripcions')
                ->join('participantes','participantes.id','=','inscripcions.c_participante') 
                ->join('actividads', 'actividads.id','=','inscripcions.c_actividad')
                ->select('inscripcions.*','participantes.nombre_participante',
                    'participantes.apellidos_participante','participantes.dni_participante',
                    'actividads.nombre_actividad','actividads.categoria')
            ->get();
        
            // dd($participantes);
        
            return view('inscripcions.index')
            ->with('inscripciones', $inscripciones);
        
        }else{

            $inscripciones=DB::table('inscripcions')
                ->join('participantes','participantes.id','=','inscripcions.c_participante') 
                ->join('actividads', 'actividads.id','=','inscripcions.c_actividad')
                ->select('inscripcions.*','participantes.nombre_participante',
                    'participantes.apellidos_participante','participantes.dni_participante',
                    'actividads.nombre_actividad','actividads.categoria')
                ->where('c_usuario','=', $usuarioLogueado->id)                 
                ->get();
        
            // dd($participantes);
        
            return view('inscripcions.index')
            ->with('inscripciones', $inscripciones);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abierto="";

        $usuarioLogueado=User::find(Auth::id());        
        
        $preinscripciones=Preinscripcion::where('plaza_obtenida','=','SI')
            ->join('participantes','participantes.id','=','preinscripcions.cod_participante') 
            ->join('actividads', 'actividads.id','=','preinscripcions.cod_actividad')
            ->select('preinscripcions.*','participantes.nombre_participante',
                'participantes.apellidos_participante','actividads.nombre_actividad','actividads.categoria')
            ->get();
    
        //dd($preinscripciones);

        $estadoPlazo=Plazo::orderBy('created_at','desc') 
            ->whereNull('deleted_at')
            ->where('tipo_plazo', '=','Inscripción')
            ->pluck('estado');
       

        foreach ($estadoPlazo as $abierto) {
            $abierto;
        }


        $c_actividad=[];
        
        /*Buscamos Actividades con Plazas Libres */
        $inscripcionesConPlaza=DB::table('inscripcions')
            ->selectRaw('count(c_actividad) as cantidad_inscripciones, c_actividad')
            ->groupBy('c_actividad')
            ->having('cantidad_inscripciones', '<',6)
            ->get();

        $plazaNoObtenida=$preinscripciones->isEmpty();
            
        /*Buscamos Todas las Actividades Si no hai ninguna Inscripción, o las que tengan plaza*/
        if(Inscripcion::all()->count()==0){

            $c_actividad=Actividad::all();

        }else{
            
            foreach ($inscripcionesConPlaza as $conPlaza) {
                $c_actividad=Arr::prepend($c_actividad, Actividad::find($conPlaza->c_actividad));
            }
        } 
        
       
        if($usuarioLogueado->hasAnyRole(['Admin', 'Super_Admin'])){    

            $c_usuario=User::orderBy('id')->with('participantes')->get();       
            $c_participante=Participante::orderBy('id')->with('inscripcion')->get();        
           
            
            //dd($plazaNoObtenida);

            if($plazaNoObtenida) {

                return view('inscripcions.create')
                    ->with(array('c_usuario'=>$c_usuario))
                    ->with(array('c_participante'=>$c_participante))
                    ->with(array('c_actividad'=>$c_actividad))
                    ->with('plazaNoObtenida',$plazaNoObtenida)
                    ->with('abierto', $abierto);  
                            
            }else{
                              
                return view('inscripcions.create')
                    ->with(array('c_usuario'=>$c_usuario))
                    ->with(array('c_participante'=>$c_participante))
                    ->with(array('c_actividad'=>$c_actividad))
                    ->with(array('preinscripciones'=>$preinscripciones))
                    ->with('plazaNoObtenida',$plazaNoObtenida)
                    ->with('abierto', $abierto);           
             
            }    
                
        }else{

            $c_usuario=User::where('id','=', $usuarioLogueado->id)->get();       
            $c_participante=Participante::orderBy('id')
                ->where('cod_user', '=', $usuarioLogueado->id)
                ->with('inscripcion')
                ->get();
       
                        
            if($plazaNoObtenida) {

                return view('inscripcions.create')
                    ->with(array('c_usuario'=>$c_usuario))
                    ->with(array('c_participante'=>$c_participante))
                    ->with(array('c_actividad'=>$c_actividad))
                    ->with('plazaNoObtenida',$plazaNoObtenida)
                    ->with('abierto', $abierto);

              
            }else{

                return view('inscripcions.create')
                    ->with(array('c_usuario'=>$c_usuario))
                    ->with(array('preinscripciones'=>$preinscripciones))
                    ->with(array('c_participante'=>$c_participante))
                    ->with(array('c_actividad'=>$c_actividad))
                    ->with('plazaNoObtenida',$plazaNoObtenida)                    
                    ->with('abierto', $abierto);
                
            }
           
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
        /*
        $preinscripciones=Preinscripcion::where('plaza_obtenida','=','SI')
            ->join('participantes','participantes.id','=','preinscripcions.cod_participante') 
            ->join('actividads', 'actividads.id','=','preinscripcions.cod_actividad')
            ->select('preinscripcions.*','participantes.nombre_participante',
                'participantes.apellidos_participante','actividads.nombre_actividad','actividads.categoria')
            ->get();
        */
            

        $request->validate([
            'c_usuario',
            'c_participante',
            'c_actividad',
            'precio',         
        ]);
       
        $actividad=DB::table('inscripcions')
            ->where('c_participante','=',$request->c_participante)
            ->where('c_actividad','=',$request->c_actividad)
            ->exists();
       
        //dd($actividad);
        
        if($actividad){
            return redirect()->back()           
                ->with('alert','ATENCIÓN: Una Inscripción por Actividad. El Participante ya tiene una Inscripción en esta Actividad. Seleccione otra Actividad');
               
        } /*elseif($preinscripciones){

            return redirect()->back()           
                ->with('alert','ATENCIÓN: Seleccione el Participante con su correspondiente Actividad');
      
        }
        */
        
        else {
        
            $inscripcion=new Inscripcion;
            
            $inscripcion->año_actividad = $request->año_actividad=date("Y");
            $inscripcion->c_usuario = $request->c_usuario;
            $inscripcion->c_participante = $request->c_participante;
            $inscripcion->c_actividad = $request->c_actividad;
            $inscripcion->precio = $request->precio="5";
            $inscripcion->save();


            // dd($validated);
            return redirect()->route('inscripcions.index')
                ->with('success','Inscripción Creada con Éxito');
        }
        
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        
        Inscripcion::find($inscripcion);
       
        $c_participante=DB::table('participantes')->where('id', '=' ,$inscripcion->c_participante)->get();
        $c_actividad=DB::table('actividads')->where('id', '=' ,$inscripcion->c_actividad)->get();
      
        return view('inscripcions.show')->with('inscripcion', $inscripcion)
            ->with(array('c_participante'=> $c_participante))
            ->with(array('c_actividad'=>$c_actividad));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        /* ------ LAS INSCRIPCIONES NO SE PODRÁN EDITAR ------ */
        Inscripcion::find($inscripcion);
      
        $c_usuario=User::orderBy('id')->with('participantes')->get();
        $c_participante=Participante::find($inscripcion->c_participante);
        $c_actividad=Actividad::find($inscripcion->c_actividad);

        return view('inscripcions.edit')->with('inscripcion', $inscripcion)
            ->with('c_usuario',$c_usuario)
            ->with('c_participante',$c_participante)
            ->with('c_actividad',$c_actividad);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
     
        /* ------ LAS INSCRIPCIONES NO SE PODRÁN EDITAR ------ */
        Inscripcion::where('id', $inscripcion->id); 
        return redirect()->back()
            ->with('alert','ATENCIÓN: Las Incripciones no se pueden Editar');
        
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripcion $inscripcion)
    {
        Inscripcion::find($inscripcion->id)->delete();
        return redirect()->route('inscripcions.index')
            ->with('success','Inscripción Eliminada Correctamente');
    }
    
    
}
