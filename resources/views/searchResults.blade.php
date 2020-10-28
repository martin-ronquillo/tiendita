{{--@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{--Filtros de busqueda
                <div class="col-3 mt-3 filtros">

                    @include('productos.complements.filtros')

                </div>

            {{--Resultados de busqueda
                <div class="row col-sm-12 col-md-12 col-lg-9 mt-3">

                    <ul class="list-group w-100">

                        @foreach ($results as $item)
                        
                            <li class="list-group-item">
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
                                    <div class="col-1">
                                        @livewire('favoritos-component', ['identificador' => $item->id])
                                    </div>
                                </div>
                                
                                <div class="divider">
                            </li>

                        @endforeach

                    </ul>

                </div>
    
        </div>
    </div>
@endsection--}}

@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('content')
    <div class="container">
        
        @livewire('filtro-component', ['busqueda' => $busqueda])

    </div>
@endsection