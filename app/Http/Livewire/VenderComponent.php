<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VenderComponent extends Component
{
    public $next1 = false;
    public $next2 = false;
    public $next3 = false;
    public $next4 = false;
    public $step2 = "display: none;";
    public $step3 = "display: none;";
    public $step4 = "display: none;";
    public $step5 = "display: none;";
    public $name;
    public $categoria = "seleccione";
    public $condicion;
    public $caracteristicas;
    public $descripcion;

    protected $rules = [
        'name' => 'required|min:7',
        'categoria' => 'required|exists:categorias,id'
    ];

    public function render()
    {
        //Si el "nombre" del producto en el primer step es verdadero, se habilita el boton "siguiente"
        if (strlen($this->name) > 6) {
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

        if (strlen($this->descripcion) >= 20 && strlen($this->caracteristicas) >= 20) {
            $this->next4 = true;
            $this->step5 = "";
        } else {
            $this->next4 = false;
        }

        return view('livewire.vender-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
