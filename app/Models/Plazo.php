<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plazo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 
        'tipo_plazo',
        'estado',   
        'editor'    
    ];

    protected $casts = [
        
    ];

    // protected $guarded = [];

    /**
     *  Plazo thatbelongTo one User
    */
    public function user()
    {        
        return $this->belongsTo(User::class, 'id','editor');
    }

}
