<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    public function transaccions(){
        return $this->hasMany(Transaccion::class);
    }

    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}
