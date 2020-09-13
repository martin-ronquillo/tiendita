<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    public function preguntas(){
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}
