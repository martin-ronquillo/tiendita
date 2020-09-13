<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsTo(Producto::class);
    }
}
