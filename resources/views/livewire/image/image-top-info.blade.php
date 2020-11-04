<div class="row">
    <div class="col-12">
        <label class="mt-3">
            <h5 class="mb-5"><b>Agreguemos algunas fotos de tu producto</b></h5>
            <em style="color: black;">
                <div class="info">
                    Para no perder exposición, asegúrate de que la primera foto tenga fondo blanco puro,
                     creado con un editor de imágenes. No agregues bordes, logos ni marcas de agua.
        
                    {{--Si existe al menos una imagen en la DB relacionada a este producto, se muestra esta informacion--}}
                    @if ($imageCount >= 1)
                        <br><br>
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-info-circle text-primary ml-4"></i>
                            </div>
                            <div class="col-11">
                                Ya se han cargado <b>{{ $imageCount }}/5</b> imagenes a esta venta. Puede concretar la publicacion 
                                o agregar <b>{{ 5 - $imageCount }}</b> imagenes mas.
                            </div>
                        </div>
                    @endif
        
                </div>
            </em>        
        </label>
    </div>
    
    <div class="col-12 mb-2">
        {{--Muestra pequeños recuadros de las imagenes que se han cargado--}}
        @if ($imageCount >= 1)
            <div class="col-12 center img-preview-content mt-1 mb-4">
                @foreach (@$file as $item)
                    <img class="img-preview" src="{{ $item->url }}" style="height: 80px;">
                    {{--Boton eliminar imgen--}}
                    <button name="{{ $item->id }}" id="delete" wire:click="delete({{ $item->id }})" class="btn-close">
                        <i class="far fa-times-circle fa-2x icon"></i>
                    </button>
                @endforeach
            </div>
        @endif
    </div>
</div>