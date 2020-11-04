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
        if ($image->count() >= 6) {

            foreach ($image as $key) {

                if ($i >= $image->count()) {
                    $borrar = Image::findOrFail($key->id);
                    $borrar->delete();
                    unset($this->file[$i-1]);
                }

                $i += 1;

            }

        }
        
        if ($image->count() >= 1 || $image == Null) {
            $this->imageCount = $image->count();
        }

        if ($image->count() >= 5 || $image == Null) {
            $this->imageSection = 0;
        }else{
            $this->imageSection = 1;
        }

        return view('livewire.image-component');
    }
}
