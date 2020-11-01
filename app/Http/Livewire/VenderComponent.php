<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VenderComponent extends Component
{
    public $next1 = false;
    public $next2 = false;
    public $next3 = false;
    public $step2 = false;
    public $step3 = false;
    public $step4 = false;
    public $name;
    public $categoria;
    public $condicion;

    public function render()
    {
        //Si el "nombre" del producto en el primer step es verdadero, se habilita el boton "siguiente"
        if (strlen($this->name) > 2) {
            $this->next1 = true;
            $this->step2 = true;
        }else{
            $this->next1 = false;
        }
        
        //Si el valor del select del second-step "categoria" es diferente a "por_defecto" habilita el boton "siguiente"
        if ($this->categoria != "seleccione" && $this->categoria != null) {
            $this->next2 = true;
            $this->step3 = true;
        } else {
            $this->next2 = false;
        }
        
        if ($this->condicion != "" && $this->condicion != null) {
            $this->next3 = true;
            $this->step4 = true;
        } else {
            $this->next3 = false;
        }

        return view('livewire.vender-component');
    }

    public function step2(){
        
        //Si se da clic en "siguiente" en el primer paso, entonces se habilita el siguiente paso
        $this->step2 = true;
    }
}
