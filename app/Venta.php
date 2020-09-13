<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function transaccions(){
        return $this->hasMany(Transaccion::class);
    }

    public function productos(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function pagos(){
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    public function envios(){
        return $this->belongsTo(Envio::class, 'envio_id');
    }
}
