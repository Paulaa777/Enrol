<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades=Actividad::all();
        
        return view('actividads.index')->with('actividades',$actividades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        $validated=$request->validate([
            'tipo'=>'required|string|max:255',  
            'nombre_actividad'=>'required|string|max:55',
            'categoria' =>'required|string|max:55',
            'lunes'=> 'boolean',
            'martes' =>'boolean',
            'miercoles'=>'boolean',
            'jueves' =>'boolean',
            'viernes' =>'boolean',
            'hora_inicio'=>'required|max:10',
            'hora_fin'=>'required|max:10', 
        ]);

        
        $actividad=DB::table('actividads')
            ->where([
                ['nombre_actividad','=', $request->nombre_actividad],
                ['categoria','=',$request->categoria],
            ])->exists();
        
        //dd($actividad);       
            
        if($actividad){

            return redirect()->back()           
            ->with('alert','ATENCIÓN: La Actividad perteneciente a esa Categoría ya Existe.');
           
        }else
        
        if(!($request->hora_inicio < $request->hora_fin) ? true: false){
        
            return redirect()->back()           
            ->with('alert','ATENCIÓN: La Hora de Inicio No puede ser Mayor o Igual a la Hora de Fin.');
           
        }else{

            Actividad::create($validated); 
            return redirect()->route('actividads.index')->with('success','Actividad Creada con Éxito');

        }                      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        Actividad::find($actividad);
        return view('actividads.show')->with('actividad',$actividad);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)    
    {
        Actividad::find($actividad);
        return view('actividads.edit')->with('actividad',$actividad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        
        $validated=$request->validate([
            'tipo'=>'required|string|max:255', 
            'nombre_actividad'=>'required|string|max:55',
            'categoria' =>'required|string|max:55',
            'lunes' =>'boolean',
            'martes' =>'boolean',
            'miercoles'=>'boolean',
            'jueves' =>'boolean',
            'viernes' =>'boolean',
            'hora_inicio'=>'required|max:10',
            'hora_fin'=>'required|max:10', 
        ]);


        if(!($request->hora_inicio < $request->hora_fin) ? true: false){
        
            return redirect()->back()           
            ->with('alert','ATENCIÓN: La Hora de Inicio No puede ser Mayor o Igual a la Hora de Fin.');
           
        }else{

            Actividad::where('id',$actividad->id)->update($validated);
            return redirect()->route('actividads.show',$actividad)->with('success','Actividad Editada con Éxito');
        
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy($actividad)
    {
        Actividad::find($actividad)->delete();
        return redirect()->route('actividads.index')->with('success','Actividad Eliminada con Éxito');
    }


    

/* ---------- Open Show Actividades ---------- */

    /**
     * Display Actividades con Plazas Libres resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
 
    public function showActividadesLibres()
    {
    
        $inscripcionesConPlaza=DB::table('inscripcions')
            ->selectRaw('count(c_actividad) as cantidad_inscripciones, c_actividad')
            ->groupBy('c_actividad')
            ->having('cantidad_inscripciones','<', 6)
            ->get();
      
        //dd($inscripcionesCompletas);
        $actividades=[];
        //dd($inscripcionesConPlaza);        
        foreach ($inscripcionesConPlaza as $conPlaza) {
            $actividades=Arr::prepend($actividades, Actividad::find($conPlaza->c_actividad));
        }
      
        return view('actividads.open.showActividadesLibres')
            ->with(array('actividades'=>$actividades));

    }

    /**
     * Display Actividades Lsitado resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    
    public function showActividadesAll()
    {
        $actividades=Actividad::orderBy('categoria','asc')->get();
        //dd($actividades);
        /*
        $cultural=$actividades->where('tipo','=','Cultural');
        $deportiva=$actividades->where('tipo','=','Deportiva');
        $tecnologica=$actividades->where('tipo','=','Tecnológica');
        */
        

       // return view('actividads.open.showActividadesAll')
        //    ->with('actividades',$actividades);
         
      return json_encode($actividades);
         
          /*  ->with('cultural', $cultural)
            ->with('deportiva', $deportiva)
            ->with('tecnologica', $tecnologica);
            */
    }

            /**
     * Display Actividades Lsitado resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    
    public function showHorariosAll()
    {
        $actividades=Actividad::orderBy('categoria','asc')->get();
                
        return view('actividads.open.showHorariosAll')
            ->with('actividades',$actividades);
   
    }

}
