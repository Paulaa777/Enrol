<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use Illuminate\Http\Request;
use App\Models\Actividad;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitores=Monitor::all();
        
        return view('monitors.index')
            ->with('monitores', $monitores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $cod_actividad=Actividad::orderBy('id')->get();
        $cod_actividad=Actividad::orderBy('id')->with('monitor')->get();
                
        // dd($cod_actividad);
        return view('monitors.create')
            ->with(array('cod_actividad'=>$cod_actividad));
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
            'nombre_monitor' =>'required|string|max:55',
            'apellidos_monitor'=>'required|string|max:100',
            /* 'dni_monitor'=>'required|string|max:9',*/
            'dni_monitor'=>['required', 'regex:/(^[0-9]{8}\-?[TRWAGMYFPDXBNJZSQVHLCKE]{1}$)|(^[XYZ]{1}[0-9]{7}\-?[{1}TRWAGMYFPDXBNJZSQVHLCKE]$)/i'],
            'email_monitor'=>'required|string|max:30',
            /* 'movil_monitor'=>'required|string|max:10',*/
            'movil_monitor'=>['required', 'regex:/^[1-9]{1}[0-9]{8}$/'],
            'cod_actividad'=>'required|numeric|min:1',
        ]);

        $actividad=DB::table('monitors')
        ->where('id','=', $request->cod_actividad)
        ->exists();

        
        if($actividad){
            return redirect()->back()           
                ->with('alert','ATENCIÓN: La Actividad ya tiene Asignado Monitor. Seleccione otra Actividad');
               
        } else {
       
            $monitor=new Monitor;
            $monitor->nombre_monitor = $request->nombre_monitor;
            $monitor->apellidos_monitor = $request->apellidos_monitor;
            $monitor->dni_monitor = $request->dni_monitor;
            $monitor->email_monitor =$request->email_monitor;
            $monitor->movil_monitor = $request->movil_monitor;
            $monitor->cod_actividad= $request->cod_actividad;
            $monitor->save();
            
            //dd($validated);
            //Monitor::created($validated);    
            return redirect()->route('monitors.index')
                ->with('success','Monitor Creado con Éxito');
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function show(Monitor $monitor)
    {
        Monitor::find($monitor);
        return view('monitors.show')
            ->with('monitor',$monitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitor $monitor)
    {
        Monitor::find($monitor);        
        $cod_actividad=Actividad::orderBy('id')->get();
        //dd($cod_actividad);
        return view('monitors.edit')
            ->with('monitor',$monitor)
            ->with(array('cod_actividad'=>$cod_actividad));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitor $monitor)
    {
        $validated=$request->validate([
            'nombre_monitor'=>'required|string|max:55',
            'apellidos_monitor'=>'required|string|max:100',
            /* 'dni_monitor'=>'required|string|max:9',*/
            'dni_monitor'=>['required', 'regex:/(^[0-9]{8}\-?[TRWAGMYFPDXBNJZSQVHLCKE]{1}$)|(^[XYZ]{1}[0-9]{7}\-?[{1}TRWAGMYFPDXBNJZSQVHLCKE]$)/i'],
            'email_monitor'=>'required|string|max:55',
           /* 'movil_monitor'=>'required|string|max:10',*/
            'movil_monitor'=>['required', 'regex:/^[1-9]{1}[0-9]{8}$/'],
            'cod_actividad'=>'required',
        ]);

        Monitor::where('id',$monitor->id)->update($validated);
        return redirect()->route('monitors.show', $monitor)
            ->with('success','Monitor Editado con Éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitor)
    {
       
        Monitor::where('id', $monitor->id)->delete();
        return redirect()->route('monitors.index')
            ->with('success','Monitor Eliminado con Éxito');
    }

}
