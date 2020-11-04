<?php

namespace App\Http\Livewire;

use App\Image;
use Livewire\Component;

class ImageComponent extends Component
{
    public $producto;
    public $file;
    public $imageSection = 1;
    public $imageCount = 0;

    protected $listeners = ['refreshImages' => '$refresh'];

    public function render()
    {
        $image = Image::where('producto_id', $this->producto)->get();
        $this->file = $image;
        $i = 1;

        //Este pequeño algoritmo detecta si hay mas de 5 imagenes en la base de datos relacionadas con una venta, elimina las 
        //sobrantes(desde el registro 6 en adelante) y le resta el ultimo registro a la variable $file
        if ($this->file->count() >= 6) {

            foreach ($this->file as $key) {

                if ($i >= 6) {
                    $borrar = Image::findOrFail($key->id);
                    $borrar->delete();
                    unset($image[$i-1]);
                    unset($this->file[$i-1]);
                    $i--;
                }

                $i++;

            }

        }
        
        if ($this->file->count() >= 1 || $this->file == Null) {
            $this->imageCount = $this->file->count();
        }

        if ($this->file->count() >= 5 || $this->file == Null) {
            $this->imageSection = 0;
        }else{
            $this->imageSection = 1;
        }

        $this->emit('refreshImages');

        return view('livewire.image-component');
    }

    public function delete($id){
        Image::destroy($id);
        $this->imageCount -= 1;

        if ($this->imageCount >= 0) {
            $this->imageSection = 1;
            $this->emit('refreshImages');
        } else {
            $this->imageSection = 0;
            $this->emit('refreshImages');
        }
    }

}
