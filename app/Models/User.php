<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        /*añado*/
        'apellidos',
        'nif',
        'nacimiento',
        'movil',
        'direccion',
        'municipio',
        'provincia',
        'codigo_postal',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  Users that has Many Participantes.
    */
    public function participantes()
    {
        return $this->hasMany(Participante::class,'cod_user','id');
    }
    
    /**
     *  Preinscripcion that belongTo one Usuario
    */
    public function preinscripciones()
    {        
        return $this->hasMany(User::class, 'cod_usuario');
    }

    /**
     *  Preinscripcion that belongTo one Usuario
    */
    public function inscripciones()
    {        
        return $this->hasMany(User::class, 'c_usuario');
    }
    

    /**
     *  Users that has Many Posts.
    */
    public function posts()
    {
        return $this->hasMany(Post::class,'autor','id');
    }

    /**
     *  Users that has Many Posts.
    */
    public function plazos()
    {
        return $this->hasMany(Plazo::class,'editor','id');
    }
}
