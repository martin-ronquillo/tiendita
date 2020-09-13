<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Producto;
use App\Pregunta;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PreguntarComponent extends Component
{
    use WithPagination;

    public $product;
    public $pregunta;

    public function render()
    {
        return view('livewire.preguntar-component', [
            'preguntas' => Pregunta::where('producto_id', $this->product)->orderBy('created_at', 'desc')->paginate(8),
            'producto' => Producto::find($this->product)
        ]);
    }

    public function store()
    {
        $this->validate(['pregunta' => 'required|min:11']);

        Pregunta::create([
            'pregunta' => $this->pregunta,
            'producto_id' => $this->product,
            'user_id' => Auth::user()->id,
        ]);
        
        //$this->edit($post->id);
        $this->default();
        $this->listeners;
    }

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function default()
    {
        $this->pregunta = '';
    }
}
