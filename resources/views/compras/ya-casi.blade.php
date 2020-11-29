@extends('layouts.app')

@section('title', 'Ya casi esta')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ya_casi.css') }}">
@endsection

@section('content')
    
    <div class="container color-green h-100">
            
        <div class="row justify-content-center h-100">

            <div class="col-1 mt-4">

            </div>
            <div class="col-4 mt-5 align-self-center">
                <em class="text-light">¡Ya casi es tuya!</em>
                <h1 class="text-light">Coordina con el vendedor el pago y el envio</h1>
            </div>
            <div class="col-2 mt-5">
                <div class="align-self-center text-center img-content">
                    <img class="text-center" src="{{ $producto->images->first()->url }}" alt="{{ $producto->name }}">
                </div>
            </div>
            <div class="col-1">

            </div>
            <div class="card col-5 mt-5 align-self-center" style="height: 250px;">
                <div class="card-body">
                    <h4 class="card-title mt-5"><b>Vendedor</b></h4>
                    <p class="card-text text-secondary mt-4">
                        <span class="text-secondary">{{ $producto->ventas->first()->users->name }} {{ $producto->ventas->first()->users->apellido_pater }}</span>
                        <br>
                        <span class="text-secondary">{{ $producto->ventas->first()->users->tlf }}</span>
                    </p>
                    <a href="{{ route('home') }}" class="mt-3">Seguir comprando!</a>
                </div>
            </div>

        </div>

    </div>

@endsection