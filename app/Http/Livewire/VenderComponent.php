<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VenderComponent extends Component
{
    public $next1 = false;
    public $next2 = false;
    public $next3 = false;
    public $next4 = false;
    public $next5 = false;
    public $step2 = "display: none;";
    public $step3 = "display: none;";
    public $step4 = "display: none;";
    public $step5 = "display: none;";
    public $nombre_producto;
    public $categoria = "seleccione";
    public $condicion;
    public $caracteristicas;
    public $descripcion;
    public $stock = 1;
    public $precio = 1;
    public $pago;
    public $envio;
    public $precio_envio = false;

    protected $rules = [
        'nombre_producto' => 'required|min:7',
        'categoria' => 'required|exists:categorias,id',
        'caracteristicas' => 'required|string|min:10|max:5500',
        'descripcion' => 'required|string|min:10|max:5500',
        'stock' => 'required|digits_between:1,3',
        'precio' => 'required|between:0.5,9.99',
        'pago' => 'required|exists:pagos,id',
        'envio' => 'required|exists:envios,id',
    ];

    public function render()
    {
        //Si el "nombre" del producto en el primer step es verdadero, se habilita el boton "siguiente"
        if (strlen($this->nombre_producto) > 6) {
            $this->next1 = true;
            $this->step2 = "";
        }else{
            $this->next1 = false;
        }
        
        //Si el valor del select del second-step "categoria" es diferente a "por_defecto" habilita el boton "siguiente"
        if ($this->categoria != "seleccione" && $this->categoria != null) {
            $this->next2 = true;
            $this->step3 = "";
        } else {
            $this->next2 = false;
        }
        
        if ($this->condicion != "" && $this->condicion != null) {
            $this->next3 = true;
            $this->step4 = "";
        } else {
            $this->next3 = false;
        }

        if (strlen($this->descripcion) >= 10 && strlen($this->caracteristicas) >= 10
            && $this->stock != 0 && $this->precio >= 0.5) {

            $this->next4 = true;
            $this->step5 = "";

        } else {
            $this->next4 = false;
        }

        if ($this->envio == 2) {
            $this->precio_envio = true;
        }else {
            $this->precio_envio = false;
        }

        if ($this->pago != "seleccione" && $this->pago != null &&
            $this->envio != "seleccione" && $this->envio != null) {

            $this->next5 = true;

        } else {
            $this->next5 = false;
        }

        return view('livewire.vender-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
