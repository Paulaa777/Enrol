<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'tipo',
        'titulo',
        'comentario',
        'autor',
        'archivado',
       
    ];

    protected $casts = [
        
    ];

    // protected $guarded = [];

    /**
     *  Posts taht belongTo one User
    */
    public function user()
    {        
        return $this->belongsTo(User::class, 'id','autor');
    }
}
