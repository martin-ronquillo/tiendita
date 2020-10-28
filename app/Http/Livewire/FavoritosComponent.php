<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Favorito;
use Illuminate\Support\Facades\Auth;

class FavoritosComponent extends Component
{
    public $identificador;
    public $unFav;

    public function render()
    {

        if (Auth::check()) {

            return view('livewire.favoritos-component', [
                'favoritos' => Favorito::where('producto_id', $this->identificador)
                                        ->where('user_id', Auth::user()->id)
                                        ->get()
            ]);

        } else {
            
            return view('livewire.favoritos-component');

        }
        
    }

    public function agregar()
    {
        Favorito::create([
            'producto_id' => $this->identificador,
            'user_id' => Auth::user()->id,
        ]);
    }

    public function quitar($id)
    {
        Favorito::destroy($id);
    }
}
