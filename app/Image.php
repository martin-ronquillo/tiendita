<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url', 'producto_id'
    ];

    public function productos(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
