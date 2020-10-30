<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Favorito;
use Illuminate\Support\Facades\Auth;

class NavComponent extends Component
{
    protected $listeners = [
        'nav:update' => '$refresh',
    ];

    public function render()
    {
        if (Auth::check()) {

            return view('livewire.nav-component', [
                'favoritos' => Favorito::where('user_id', Auth::user()->id)
                                        ->get()
            ]);

        } else {
            
            return view('livewire.nav-component');

        }
    }
}
