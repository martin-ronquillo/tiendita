<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
        'pregunta', 'producto_id', 'user_id',
    ];

    public function respuestas(){
        return $this->hasOne(Respuesta::class);
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productos(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
