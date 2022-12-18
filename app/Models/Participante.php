<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_participante',
        'apellidos_participante',
        'dni_participante',
        'nacimiento_participante',
        'movil_participante',
        'cod_user',
    ];

    protected $casts = [
        
    ];

    /**
     *  Participantes taht belongTo one User
     */
    public function user()
    {        
        return $this->belongsTo(User::class, 'id','cod_user');
    }

    /**
     *  Preinscripcion that belongTo one Usuario
     */
    public function preinscripcion()
    {        
        return $this->belongsTo(Participante::class, 'cod_participante');
    }

    /**
     *  Inscripcion that belongTo one Usuario
     */
    public function inscripcion()
    {        
        return $this->belongsTo(Participante::class, 'c_participante');
    }
}
