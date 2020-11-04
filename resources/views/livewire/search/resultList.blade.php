@php
    $i = 0;

    foreach($results as $key){
        $i += 1;
    }
@endphp

{{--Si los resultados de busqueda son menor a 1, mostrara un mensaje de advertencia--}}
@if ($i >= 1)
    @foreach ($results as $item)
        @if (@!$provincia || @$provincia === 'n/a')
            <li class="list-group-item" wire:key="{{ $item->id }}">
                <div class="row">

                    <div class="col-3 img-content text-center">

                        @if ($item->images->first())
                            <a href="{{ route('productos.show', $item->id) }}">
                                <img class="ml-3" src="{{ $item->images->first()->url }}" alt="{{ $item->name }}">
                            </a>
                        @else
                            <a href="{{ route('productos.show', $item->id) }}">
                                <img class="ml-3" src="{{ asset('images/no-image.png') }}" alt="{{ $item->name }}">
                            </a>
                        @endif

                    </div>

                    <div class="col-7 ml-5">
                        <a href="{{ route('productos.show', $item->id) }}" class="none-a">
                            <h5>{{ $item->name }}</h5>
                        </a>
                        <br>
                        <strong>
                            <div class="row">
                                <h2 class="ml-3">U$S {{ $item->precio }}</h2>
                            </div>
                        </strong>
                        <em class="text-success">Envio {{ @$item->ventas->first()->envios->metodo }}</em>
                    </div>

                </div>
                
                <div class="divider">
            </li>
        @else
            @if (@$provincia === $item->ventas->first()->users->provincias->name)
                <li class="list-group-item" wire:key="{{ $item->id }}">
                    <div class="row">
                        <div class="col-3 img-content text-center">
                            <a href="{{ route('productos.show', $item->id) }}">
                                <img class="ml-3" src="{{ asset('images/1.png') }}" alt="{{ $item->name }}">
                            </a>
                        </div>
                        <div class="col-7 ml-5">
                            <a href="{{ route('productos.show', $item->id) }}" class="none-a">
                                <h5>{{ $item->name }}</h5>
                            </a>
                            <br>
                            <strong>
                                <div class="row">
                                    <h2 class="ml-3">U$S {{ $item->precio }}</h2>
                                </div>
                            </strong>
                            <em class="text-success">Envio {{ @$item->ventas->first()->envios->metodo }}</em>
                        </div>
                        {{--<div class="col-1">
                            @livewire('favoritos-component', ['identificador' => $item->id])
                        </div>--}}
                    </div>
                    
                    <div class="divider">
                </li>
            @endif
        @endif
    @endforeach

@else

    <li class="list-group-item">
        <div class="row">
            <div class="col-3 img-content text-center mt-5 mb-5">
                <img class="ml-3" src="{{ asset('images/Sin_resultados.png') }}">
            </div>
            <div class="col-7 ml-5 mt-5 mb-5">
                <h2>No hay publicaciones que coincidan con tu búsqueda.</h2>
                <ul>
                    <li>
                        Revisa la ortografía de la palabra.
                    </li>
                    <li>
                        Utiliza palabras más genéricas o menos palabras.
                    </li>
                </ul>
            </div>
        </div>
    </li>

@endif