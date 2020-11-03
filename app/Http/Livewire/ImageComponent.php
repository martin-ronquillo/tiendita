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
