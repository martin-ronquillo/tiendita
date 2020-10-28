<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = [
        'producto_id', 'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsTo(Producto::class);
    }
}
