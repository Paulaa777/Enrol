<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'año_actividad',
        'plaza_obtenida',
        'cod_usuario',
        'cod_participante',
        'cod_actividad',
        
    ];

    protected $casts = [
        
    ];

    /**
     *  Participantes taht belongTo one User
     */
    public function user()
    {        
        return $this->belongsTo(User::class,'cod_user');
    }

    /**
     *  Preinscripcion that belongTo one Participante
     */
    public function participante()
    {        
        return $this->hasOne(Participante::class,'cod_participante');
    }

    /**
     *  Preinscripcion that Has one Actividad
     */
    public function actividad()
    {        
        return $this->hasOne(Actividad::class, 'cod_actividad');
    }

}
