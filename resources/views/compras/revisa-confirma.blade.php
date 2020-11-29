@extends('layouts.app')

@section('title', 'Confirmar compra')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                <p><b><h3>Revisa y confirma tu compra</h3></b></p>
                <br>
                <p class="mt-2"><b>Detalles del envío</b></p>
                <div class="card align-self-center w-100">
                    <div class="card-body">
                        <p class="card-text text-secondary mt-2 mb-2">
                            <i class="far fa-comment-alt ml-2 mr-3 text-primary"></i>
                            {{ $producto->ventas->first()->envios->metodo }}
                        </p>
                    </div>
                </div>
                <br>
                <p class="mt-4  "><b>Detalles del pago</b></p>
                <div class="card align-self-center w-100">
                    <div class="card-body">
                        <p class="card-text text-secondary mt-2 mb-2">
                            <i class="far fa-handshake ml-2 mr-3 text-primary"></i>
                            {{ $producto->ventas->first()->pagos->metodo }}
                        </p>
                    </div>
                </div>

                <br><br><br><br><br>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-4" style="margin-top: -16px;">
                <ul class="lista w-100 h-100">
                    <li class="lista-item h-100">
                        <div class="align-self-center text-center img-content mt-5">
                            <img class="text-center img" src="{{ $producto->images->first()->url }}" alt="{{ $producto->name }}">
                            <p class="mt-3">{{ $producto->name }}</p>
                            <p class="mt-3">Cantidad: <span class="text-secondary">{{ $cantidad }}</span></p>

                            <br>
                            <hr>

                            <div class="row">
                                <div class="col-8 text-left">
                                    <p>Producto</p>
                                    <p>x {{ $cantidad }} Unidades</p>
                                    <p class="mt-2">Envio</p>
                                </div>
                                <div class="col-2 text-right">
                                    <p class="text-secondary">U$S{{ $producto->precio }}</p>
                                    <p class="text-secondary">U$S{{ $producto->precio * $cantidad}}</p>
                                    @if (@$producto->ventas->first()->precio_envio)
                                        <p class="text-secondary">U$S{{ $producto->ventas->first()->precio_envio }}</p>
                                    @else
                                        <p class="text-secondary">---</p>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-8 text-left">
                                    <b><p>Pagas</p></b>
                                </div>
                                <div class="col-2 text-right">
                                    <b><p class="text-secondary">U$S{{ $producto->precio * $cantidad + $producto->ventas->first()->precio_envio }}</p></b>
                                </div>
                            </div>

                            <form action="{{ route('compras.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="producto" value="{{ $producto->id }}">
                                <input type="hidden" name="cantidad" value="{{ $cantidad }}">
                                <input type="hidden" name="precion_envio" value="{{ $producto->ventas->first()->precio_envio }}">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Confirmar Compra
                                </button>

                            </form>
                            
                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </div>

@endsection