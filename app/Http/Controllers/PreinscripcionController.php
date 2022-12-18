<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Participante;
use App\Models\Preinscripcion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Plazo;
use Illuminate\Support\Facades\Auth;


class PreinscripcionController extends Controller
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
        
            $preinscripciones=DB::table('preinscripcions')
                ->join('participantes','participantes.id','=','preinscripcions.cod_participante') 
                ->join('actividads', 'actividads.id','=','preinscripcions.cod_actividad')
                ->select('preinscripcions.*','participantes.nombre_participante',
                    'participantes.apellidos_participante','participantes.dni_participante',
                    'actividads.nombre_actividad','actividads.categoria')
                ->get();

            //dd($preinscripciones);            
            return view('preinscripcions.index')->with('preinscripciones', $preinscripciones);
        
        } else {
            $preinscripciones=DB::table('preinscripcions')
            ->join('participantes','participantes.id','=','preinscripcions.cod_participante') 
            ->join('actividads', 'actividads.id','=','preinscripcions.cod_actividad')
            ->select('preinscripcions.*','participantes.nombre_participante',
                'participantes.apellidos_participante','participantes.dni_participante',
                'actividads.nombre_actividad','actividads.categoria')
            ->where('cod_usuario','=', $usuarioLogueado->id)            
            ->get();

            //dd($preinscripciones);            
            return view('preinscripcions.index')->with('preinscripciones', $preinscripciones);
    
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

        $estadoPlazo=Plazo::orderBy('created_at','desc') 
        ->whereNull('deleted_at')
        ->where('tipo_plazo', '=','Preinscripción')
        ->pluck('estado');

        foreach ($estadoPlazo as $abierto) {
            $abierto;
        }

        $usuarioLogueado=User::find(Auth::id());
        $cod_actividad=Actividad::orderBy('id')->with('preinscripcion')->get();
       
        if($usuarioLogueado->hasAnyRole(['Admin', 'Super_Admin'])){

            $cod_usuario=User::orderBy('id')->with('participantes')->get();       
            $cod_participante=Participante::orderBy('id')->with('preinscripcion')->get();
        
                return view('preinscripcions.create')
                    ->with(array('cod_usuario'=>$cod_usuario))
                    ->with(array('cod_participante'=>$cod_participante))
                    ->with(array('cod_actividad'=>$cod_actividad))
                    ->with('abierto', $abierto);
        } else {

            $cod_usuario=User::where('id','=', $usuarioLogueado->id)->get(); 
            $cod_participante=Participante::orderBy('id')
                ->where('cod_user','=', $usuarioLogueado->id)
                ->with('preinscripcion')->get();
        
            return view('preinscripcions.create')
                ->with(array('cod_usuario'=>$cod_usuario))
                ->with(array('cod_participante'=>$cod_participante))
                ->with(array('cod_actividad'=>$cod_actividad))
                ->with('abierto', $abierto);

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
            'cod_usuario',
            'cod_participante',
            'cod_actividad',
            'plaza_obtenida',
        ]);
       
        $participante=DB::table('preinscripcions')
            ->where('cod_participante','=',$request->cod_participante)
            ->exists();
        // dd($participante);
        
        if($participante){
            return redirect()->back()           
                ->with('alert','ATENCIÓN: Una Preinscripción por Participante. El Participante escogido ya tiene una Preinscripción. Seleccione otro Participante');
               
        } else {
        
            $preinscripcion=new Preinscripcion;
            
            $preinscripcion->año_actividad = $request->año_actividad=date("Y");
            $preinscripcion->cod_usuario = $request->cod_usuario;
            $preinscripcion->cod_participante = $request->cod_participante;
            $preinscripcion->cod_actividad = $request->cod_actividad;
            $preinscripcion->plaza_obtenida = $request->plaza_obtenida="0";
            $preinscripcion->save();


            // dd($validated);
            return redirect()->route('preinscripcions.index')
                ->with('success','Preinscripción Creada con Éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Preinscripcion $preinscripcion)
    {
            Preinscripcion::find($preinscripcion);        
        
            $cod_participante=DB::table('participantes')->where('id', '=' ,$preinscripcion->cod_participante)->get();
            $cod_actividad=DB::table('actividads')->where('id', '=' ,$preinscripcion->cod_actividad)->get();
        
            return view('preinscripcions.show')->with('preinscripcion', $preinscripcion)
                ->with(array('cod_participante'=> $cod_participante))
                ->with(array('cod_actividad'=>$cod_actividad));
           
    }


  /* ----- Únicamnete se Edita Plaza Obtenida por ADMIN---------- */
       
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Preinscripcion $preinscripcion)
    {
        Preinscripcion::find($preinscripcion);
        //  dd($preinscripcion);
        $cod_usuario=User::orderBy('id')->with('participantes')->get();
        $cod_participante=Participante::find($preinscripcion->cod_participante);
        $cod_actividad=Actividad::find($preinscripcion->cod_actividad);

        return view('preinscripcions.edit')->with('preinscripcion', $preinscripcion)
            ->with('cod_usuario',$cod_usuario)
            ->with('cod_participante',$cod_participante)
            ->with('cod_actividad',$cod_actividad);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preinscripcion $preinscripcion)
    {

        /* -- Únicamente Edita  Admin Plaza Obtenida -- */
               
        $request->validate([
            'plaza_obtenida',
        ]);
      
        $validated=([
            'plaza_obtenida'=> $request->plaza_obtenida,
        ]);

        Preinscripcion::where('id', $preinscripcion->id)->update($validated); 
        return redirect()->route('preinscripcions.index')
            ->with('success','Preinscripción Editada con Éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preinscripcion $preinscripcion)
    {
        Preinscripcion::find($preinscripcion->id)->delete();
        return redirect()->route('preinscripcions.index')
            ->with('success','Preinscripción Eliminada Correctamente');
    }



    /* --------------- ASIGNAR PLAZAS ---------------- */

        /**
     * Display a Index of Asignar Plazas Preinscripciones of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAsignarPlazasPre()
    {
        
        return view('preinscripcions.indexAsignarPlazasPre');
      
    }

    /**
     * Display a listing of Plazas Preinscripcions.
     *
     * @return \Illuminate\Http\Response
     */
    public function listadosPlazasPreinscripcion()
    {
        
        /*Actividades Plazas Completas*/
        $preinscripcionesCompletas=DB::table('preinscripcions')
           ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
           ->groupBy('cod_actividad')
           ->having('cantidad_preinscripciones', '=', 5)
           ->get();
     
      // dd($preinscripcionesCompletas);
        $actividadesCompletas=[];
        foreach ($preinscripcionesCompletas as $completas) {
            $actividadesCompletas=Arr::prepend($actividadesCompletas, Actividad::find($completas->cod_actividad));
        }       
               
       /*Actividades SobrePasadas Plazas*/
        $preinscripcionesSobrepasaParticipantes=DB::table('preinscripcions')
            ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
            ->groupBy('cod_actividad')
            ->havingBetween('cantidad_preinscripciones', [6, 500])
            ->get();       
        // dd($preinscripcionesSobrepasaParticipantes);
       
        $actividadesSobrepasa=[];        
        foreach ( $preinscripcionesSobrepasaParticipantes as $sobrepasa) {
            $actividadesSobrepasa=Arr::prepend($actividadesSobrepasa, Actividad::find($sobrepasa->cod_actividad));
        }
        // dd($actividadesSobrepasa);

        /*Actividades Sin Mínimo Plazas*/
        $preinscripcionesSinMinimoParticipantes=DB::table('preinscripcions')
            ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
            ->groupBy('cod_actividad')
            ->havingBetween('cantidad_preinscripciones', [0, 2])
            ->get();                   
        // dd($preinscripcionesSinMinimoParticipantes);

        $actividadesSinMinimo=[];  
        foreach ( $preinscripcionesSinMinimoParticipantes as $sinMinimo) {
            $actividadesSinMinimo=Arr::prepend($actividadesSinMinimo, Actividad::find($sinMinimo->cod_actividad));                       
        }
        //  dd($actividadesSinMinimo);

        return view('preinscripcions.listadosPlazasPreinscripcion')
            ->with('actividadesCompletas', $actividadesCompletas)
            ->with('actividadesSobrepasa', $actividadesSobrepasa)  
            ->with('actividadesSinMinimo', $actividadesSinMinimo);
      
    }



      /*-----  PLAZAS COMPLETAS ------*/

    /**
     * Show the form for editing Asignar Plazas Completas resource.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function asignarPlazasPreinscripcion(Preinscripcion  $preinscripcion)
    {
       // Preinscripcion::find($preinscripcion);      
          
        /*Actividades Plazas Completas*/
        $preinscripcionesConPlaza=DB::table('preinscripcions')
           ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
           ->groupBy('cod_actividad')
           ->having('cantidad_preinscripciones','=', 5)
           ->get();
     
        //dd($preinscripcionesConPlaza);
        $preinscripcionesPlazaSI=[];
        foreach ($preinscripcionesConPlaza as $conPlaza) {
            //dd($conPlaza->cod_actividad);
            $preinscripcionesPlazaSI=Arr::prepend($preinscripcionesPlazaSI, 
                (Preinscripcion::orderBy('id')
                ->where('cod_actividad',$conPlaza->cod_actividad)
                ->get())
            );
        }
                     
       // dd($preinscripcionesPlazaSI);
       $preinscripcion=[];
        foreach ($preinscripcionesPlazaSI as $preinscripciones){
            foreach ($preinscripciones as $p){
               $preinscripcion=Arr::prepend($preinscripcion, $p);
            }
       }
      // dd($preinscripcion);
      
        return view('preinscripcions.asignarPlazasPreinscripcion')
            ->with('preinscripcion', $preinscripcion);
    }

    /**
     * Update the specified resource Asignar Plazas Completas in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function updateAsignarPlazasPreinscripcion(Request $request, Preinscripcion $preinscripcion)
    {

        /* -- Únicamente Edita  Admin Plaza Obtenida -- */
        
        if($request->plaza_obtenida){
        
            $request->validate([
            'plaza_obtenida',
            ]);
        
            $validated=([
            'plaza_obtenida'=> $request->plaza_obtenida='SI',
                
            ]);

            /*Actividades Plazas Completas*/
            $preinscripcionesConPlaza=DB::table('preinscripcions')
            ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
            ->groupBy('cod_actividad')
            ->having('cantidad_preinscripciones', '=', 5)
            ->get();
     
            //dd($preinscripcionesConPlaza);
            $preinscripcionesPlazaSI=[];
            foreach ($preinscripcionesConPlaza as $conPlaza) {
                //dd($conPlaza->cod_actividad);
                $preinscripcionesPlazaSI=Arr::prepend($preinscripcionesPlazaSI, 
                    (Preinscripcion::orderBy('id')
                    ->where('cod_actividad',$conPlaza->cod_actividad)
                    ->get())
                );
            }

            $preinscripcion=[];
            foreach ($preinscripcionesPlazaSI as $preinscripciones){
                foreach ($preinscripciones as $preinscripcion){
                
                    Preinscripcion::where('id', $preinscripcion->id)->update($validated); 
                }
            }
        
            // dd($validated);
            return redirect()->route('preinscripcions.asignarPlazasPreinscripcion.edit')
                    ->with('success','Preinscripciones Editadas con Éxito');
            
        }else{
        
            return redirect()->route('preinscripcions.asignarPlazasPreinscripcion.edit')
                ->with('alert','No se ha marcado ninguna Preinscripciones para Actualizar');
        
        }     

    }

    
    /*-----  PLAZAS SUPERADAS ------*/

    /**
     * Show the form for editing Asignar Plazas Superadas resource.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function asignarPlazasPreSuperadas(Preinscripcion  $preinscripcion)
    {
       // Preinscripcion::find($preinscripcion);      
          
        /*Actividades Plazas Completas*/
        $preinscripcionesSuperadas=DB::table('preinscripcions')
           ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
           ->groupBy('cod_actividad')
           ->havingBetween('cantidad_preinscripciones', [6, 500])
           ->get();
     
        $preinscripcionesPlazaNO=[];
        foreach ($preinscripcionesSuperadas as $superadas) {
            //dd($conPlaza->cod_actividad);
            $preinscripcionesPlazaNO=Arr::prepend($preinscripcionesPlazaNO, 
                (Preinscripcion::orderBy('id')
                ->where('cod_actividad',$superadas->cod_actividad)
                ->get())
            );
        }
                     
       $preinscripcion=[];
        foreach ($preinscripcionesPlazaNO as $preinscripciones){
            foreach ($preinscripciones as $p){
               $preinscripcion=Arr::prepend($preinscripcion, $p);
            }
       }
      // dd($preinscripcion);
      
        return view('preinscripcions.asignarPlazasPreSuperadas')
            ->with('preinscripcion', $preinscripcion);
    }

    /**
     * Update the specified resource Asignar Plazas Superadas in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function updateAsignarPlazasPreSuperadas(Request $request, Preinscripcion $preinscripcion)
    {

        /* --------ÚNICAMENTE SE EDITA PLAZA OBTENIDA POR ADMIN---------- */
        
        if($request->plaza_obtenida){

            $request->validate([
            'plaza_obtenida',
            ]);
        
            $validated=([
            'plaza_obtenida'=> $request->plaza_obtenida='SI',
                
            ]);

            /*Actividades Plazas Superadas*/
            $preinscripcionesSuperadas=DB::table('preinscripcions')
            ->selectRaw('count(cod_actividad) as cantidad_preinscripciones, cod_actividad')
            ->groupBy('cod_actividad')
            ->havingBetween('cantidad_preinscripciones', [6, 500])
            ->get();
     
            $preinscripcionesPlazaNO=[];
            foreach ($preinscripcionesSuperadas as $superadas) {
            $preinscripcionesPlazaNO=Arr::prepend($preinscripcionesPlazaNO, 
                    (Preinscripcion::orderBy('id')
                    ->where('cod_actividad',$superadas->cod_actividad)
                    ->get())
                );
            }

            $preinscripcion=[];
            foreach ($preinscripcionesPlazaNO as $preinscripciones){
                foreach ($preinscripciones as $preinscripcion){
                
                    Preinscripcion::where('id', $preinscripcion->id)->update($validated); 
                }
            }
        
            return redirect()->route('preinscripcions.asignarPlazasPreSuperadas.edit')
                ->with('success','Preinscripciones Editadas con Éxito');
    
        }else{

            return redirect()->route('preinscripcions.asignarPlazasPreSuperadas.edit')
                ->with('alert','No se ha marcado ninguna Preinscripciones para Actualizar');

        }            

    }


}
