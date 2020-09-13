<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    public function compras(){
        return $this->belongsTo(Compra::class);
    }

    public function ventas(){
        return $this->belongsTo(Venta::class);
    }

    public function pagos(){
        return $this->belongsTo(Pago::class);
    }

    public function envios(){
        return $this->belongsTo(Envio::class);
    }
}
