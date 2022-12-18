<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;
    protected $fillable = [ 

        'nombre_monitor',
        'apellidos_monitor',
        'dni_monitor',
        'email_monitor',
        'movil_monitor',
        'cod_actividad',
       
    ];

    protected $casts = [
        
    ];

    //protected $guarded = [];

    /**
     *  Actividades that has Many Monitores.
     */
    public function actividads()
    {
        return $this->hasMany(Actividad::class,'id' ,'cod_actividad');
    }
    
}
