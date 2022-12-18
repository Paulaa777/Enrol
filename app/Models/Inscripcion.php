<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'año_actividad',
        'precio',
        'pagada',
        'c_usuario',
        'c_participante',
        'c_actividad',
        
    ];

    protected $casts = [
        
    ];

    /**
     *  Participantes taht belongTo one User
     */
    public function user()
    {        
        return $this->belongsTo(User::class,'c_user');
    }

    /**
     *  Inscripcion that belong to  Participante
     */
    public function participante()
    {        
        return $this->belongTo(Participante::class,'c_participante');
    }

    /**
    *  Inscripcion that Has one Actividad
    */
    public function actividad()
    {        
        return $this->hasOne(Actividad::class, 'c_actividad');
    }

}
