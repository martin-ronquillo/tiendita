<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Venta;
use App\Respuesta;
use Illuminate\Support\Facades\Auth;

class ResponderComponent extends Component
{
    public $ventas;
    public $respuesta;

    public function render()
    {
        $ventas = Venta::where('user_id', Auth::user()->id)->get();
        
        //Obtener unicamente las ventas que poseen preguntas sin responder
            $resultadoVentas = [];

            foreach ($ventas as $venta) {
                foreach ($venta->productos->preguntas as $preguntas) {
                    if (!$preguntas->respuestas) {
                        $resultadoVentas[] = @$venta->id;
                    }
                }
            }

            @$preguntaVentas = array_unique($resultadoVentas);

        return view('livewire.responder-component', [
            'ventas' => $ventas,
            'preguntaVentas' => $preguntaVentas,
        ]);
    }

    public function store($pregunta)
    {
        $this->validate(['respuesta' => 'required|min:1']);

        Respuesta::create([
            'respuesta' => $this->respuesta,
            'pregunta_id' => $pregunta,
        ]);

        $this->respuesta = null;
    }
}
