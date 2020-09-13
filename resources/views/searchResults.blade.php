@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-3 mt-3 filtros">

                <h1 class="text-capitalize">{{ $busqueda }}</h1>

                <em class="ml-auto text-secondary">{{ $results->count() }} resultados</em>

                <br><br>
                <h4>Ordenar publicaciones</h4>
                <select name="" id="" class="no-arrow">
                    <option value="relevante" selected>Mas Relevante</option>
                    <option value="mayor">Mayor Precio</option>
                    <option value="menor">Menor Precio</option>
                </select>

                <br><br>
                <h4>Condicion</h4>
                <a href="#"><em>Nuevo (162)</em></a>
                <br>
                <a href="#"><em>Usado (8)</em></a>
                
                <br><br>
                <h4>Ubicacion</h4>
                <a href="#"><em>Pichincha</em></a>
                <br>
                <a href="#"><em>Guayas</em></a>
                <br>
                <a href="#"><em>Azuay</em></a>
                <br>
                <a href="#"><em>El Oro</em></a>
                <br>
                <a href="#"><em>Imbabura</em></a>
                <br>
                <a href="#"><em>Tungurahua</em></a>
                <br>
                <a href="#"><em>Zamora Chinchipe</em></a>
                <br>
                <a href="#"><em>Chimborazo</em></a>
                <br>
                <a href="#"><em>Manabi</em></a>
            </div>

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
                                    <em class="text-success">Envio gratis</em>
                                </div>
                                <div class="col-1">
                                    <button class="btn-icon ml-auto">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="divider">
                        </li>

                    @endforeach

                </ul>

            </div>
    
        </div>
    </div>
@endsection