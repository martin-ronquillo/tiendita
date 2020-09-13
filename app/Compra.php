<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsTo(Producto::class);
    }

    public function transaccions(){
        return $this->hasMany(Transaccion::class);
    }
}
