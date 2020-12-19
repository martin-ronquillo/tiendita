<div class="card-header" style="background-color: white;">
    <div class="row">

        <div class="col-2">
            
            <div class="img-content-compras text-center mt-1">
                @if (@$venta->productos->images->first())
                    <img class="img-compras" src="{{ $venta->productos->images->first()->url }}" alt="{{ $venta->productos->name }}">
                @else
                    <img class="img-compras" src="{{ asset('images/no-image.png') }}" alt="no-image">
                @endif
            </div>

        </div>

        <div class="col-5 mt-4">
            <p class="" style="font-size: 17px;">
                <a href="{{ route('productos.show', $venta->productos->id) }}" class="text-dark no-link" target="_blank">
                    {{ $venta->productos->name }}
                </a>
            </p>
        </div>

        <div class="col-2 mt-4">
            <span class="text-secondary">
                U$S{{ $venta->productos->precio }}
            </span>
        </div>

        <div class="col-3 mt-4">
            <span>
                {{ $venta->estado }} - Gratuita
            </span>
            <p class="text-secondary">
                Envio {{ $venta->envios->metodo }}                                                
            </p>
        </div>

    </div>
</div>