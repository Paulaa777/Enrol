<?php

namespace App\Models;

//use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Monitor;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
       // 'grupo',
        'nombre_actividad',
        'categoria',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'hora_inicio',
        'hora_fin', 
     //   'cod_monitor',
        
    ];

    protected $casts = [
       
       'lunes'=> 'boolean',
        'martes'=> 'boolean',
        'miercoles'=> 'boolean',
        'jueves' => 'boolean',
        'viernes'=> 'boolean',
        
    ];
    

    /**
     *  Monitores that belong to the Actividad.
    */ 
    public function monitor()
    {
        return $this->hasOne(Monitor::class, 'cod_actividad', 'id');
    }
    
    /**
     *  Participante that Has one PreinscripcionActividad
    */
    public function preinscripcion()
    {        
        return $this->hasOne(Preinscripcion::class, 'cod_actividad');
    }

    /**
     *  Participante that Has one InscripcionActividad
    */
    public function inscripcion()
    {        
        return $this->hasOne(Inscripcion::class, 'c_actividad');
    }

}
