@php
    //Selecciona todas las provincias de la que provienen los productos y
    //las filtra para que no se repitan
    $provincias = [];

    foreach ($results as $item) {
        $provincias[] = $item->ventas->first()->users->provincias->name;
    }

    $resultadoProvincias = array_unique($provincias)

@endphp

<h1 class="text-capitalize">{{ $busqueda }}</h1>

<em class="ml-auto text-secondary">{{ $results->count() }} resultados</em>

<br><br>
<form name="filterForm" action="{{ route('filter') }}" method="GET">
    @csrf

    <input type="hidden" name="search" value="{{ $busqueda }}">

    {{--<h4>Ordenar publicaciones</h4>
    <select name="orderByPrice" wire:model="orderByPrice" class="no-arrow">
        <option value="relevante">Mas Relevante</option>
        <option value="mayor">Mayor Precio</option>
        <option value="menor">Menor Precio</option>
    </select>

    <br><br>
    <h4>Condicion</h4>
    <a href="#"><em>Nuevo (162)</em></a>
    <br>
    <a href="#"><em>Usado (8)</em></a>--}}
    
    <h4>Ubicacion</h4>

    @if (@!$filtroProvincia)
        @foreach ($resultadoProvincias as $item)
            <button 
                type="submit" 
                name="provincia" 
                value="{{ $item }}"
                class="text-center link"
            >
                <em>{{ $item }}</em>
            </button>
            <br>
        @endforeach
    @else
        <a href="javascript:history.back()" class="" 
        style="border: 1px solid rgba(46, 46, 46, 0.555);
                border-radius: 10% 10% 10% 10%;
                height: 20px;
                padding-left: 3px;
                padding-right: 3px;
                background-color: white">
            {{ $filtroProvincia }}
            <i class="fas fa-times-circle"></i>
        </a>
    @endif

</form>