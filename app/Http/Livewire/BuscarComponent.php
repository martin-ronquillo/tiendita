<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Producto;

class BuscarComponent extends Component
{
    public $buscar;
    public $items;

    public function render()
    {
        return view('livewire.buscar-component');
    }

    public function updatedBuscar()
    {
        $this->validate([
            "buscar" => "required|min:3"
        ]);

        $this->items = Producto::where('name', 'LIKE', "%".trim($this->buscar)."%")
                                ->orWhere('caracteristicas', 'LIKE', "%".trim($this->buscar).'%')
                                ->take(5)
                                ->get();
    }
}
