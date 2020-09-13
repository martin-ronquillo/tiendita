<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }

    public function favoritos(){
        return $this->hasMany(Favorito::class);
    }

    public function compras(){
        return $this->hasMany(Compra::class);
    }
    
    public function ventas(){
        return $this->hasMany(Venta::class);
    }

    public function categorias(){
        return $this->belongsTo(Categoria::class);
    }
}
