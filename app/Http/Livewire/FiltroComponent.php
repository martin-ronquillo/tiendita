<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Producto;
use Illuminate\Support\Facades\DB;

class FiltroComponent extends Component
{
    public $busqueda;
    public $orderByPrice;
    public $condicion;
    public $provincia;

    public function render()
    {
        /*if($this->condicion){
            DB::enableQueryLog();
        }*/

        $results = Producto::where('name', 'LIKE', '%'.$this->busqueda.'%');
                            //->orWhere('caracteristicas', 'LIKE', '%'.$this->busqueda.'%');

        $results->when($this->condicion && $this->condicion != 'n/a', function ($q) {
            return $q->where('estado', $this->condicion);
        });
        
        $results->when($this->orderByPrice && $this->orderByPrice != 'n/a', function ($q) {
            return $q->orderBy('precio', $this->orderByPrice);
        });

        $results = $results->get();
        
        $this->emit('nav:update');

        return view('livewire.filtro-component',[
            'results' => $results,
            'results2' => Producto::where('name', 'LIKE', '%'.$this->busqueda.'%')
                                    //->orWhere('caracteristicas', 'LIKE', '%'.$this->busqueda.'%')
                                    ->get(),
            'busqueda' => $this->busqueda,
            'provincia' => $this->provincia,
        ]);
    }
}
