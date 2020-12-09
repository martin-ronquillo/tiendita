@extends('layouts.app')

@section('title', 'Detalle de venta')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                
                <p><b><h3>{{ $venta->productos->name }}</h3></b></p>
                <span class="text-secondary" style="font-size: 11px;">Venta #{{ $venta->id }} | {{ $venta->created_at }}</span>
                <br>
                
                {{--Comprador--}}
                <div class="card align-self-center w-100 mt-4">
                    <div class="card-body" style="background-color: rgba(128, 128, 128, 0.178);">
                        <div class="row">

                            <div class="col-1 mt-2">
                                <i class="fas fa-user-circle fa-3x text-secondary"></i>
                            </div>

                            <div class="col-11 mt-2">

                                <span class="text-secondary" style="font-size: 12px;">

                                    @foreach ($venta->transaccions as $transaccion)

                                        <b class="text-dark">{{ $transaccion->compras->users->name }} {{ $transaccion->compras->users->apellido_pater }}</b> | 
                                        {{ $transaccion->compras->users->email }}

                                        <p class="text-secondary">
                                            Ningun mensaje por aqui.
                                        </p>
                                        
                                    @endforeach

                                </span>

                            </div>

                        </div>
                    </div>
                </div>

                {{--Datos del producto vendido--}}
                <div class="card no-border mt-4 mb-4">
        
                    <div class="card-header" style="background-color: white;">
                        <div class="row">
                            
                            @foreach ($venta->transaccions as $transaccion)

                                <div class="col-12 mt-2">

                                    @php
                                        //Calcular cuando se hizo la transaccion
                                            $date = date("Y-m-d");
                                            //resta los dias actuales menos los dias de la fecha final para obtener los dias restantes
                                            $diff = abs(strtotime($date) - strtotime(@$transaccion->created_at));
                                            //convertir a años
                                            $years = floor($diff / (365*60*60*24));
                                            //convertir a meses
                                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                            //convertir a dias
                                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                    @endphp
                                    <span style="font-size: 16px;">
                                        <b>
                                            @if ($transaccion->estado === Null &&  $days >= 10)
                                                Venta concretada
                                            @endif
                                            @if ($transaccion->estado === Null &&  $days <= 9)
                                                Venta pendiente
                                            @endif
                                            @if ($transaccion->estado)
                                                Venta {{ $transaccion->estado }}
                                            @endif
                                        </b>
                                    </span>
                                    <span class="text-secondary" style="font-size: 11px;"> 
                                        | No calificaste
                                    </span>
                                    @if ( $transaccion->estado === Null &&  $days >= 10)
                                        <p class="text-secondary" style="font-size: 11px;">
                                            Concretamos la venta porque ya pasaron {{ $days }} dias desde que te compraron.
                                        </p>
                                    @endif

                                </div>

                            @endforeach

                        </div>
                    </div>

                    <div class="card-body" style="background-color: transparent;">
                        <div class="row">

                            <div class="col-2 mt-5">
                                
                                <div class="img-content-compras text-center">
                                    <img class="img-compras" src="{{ $venta->productos->images->first()->url }}" alt="{{ $venta->productos->name }}">
                                </div>

                            </div>

                            <div class="col-6 mt-2">
                                <span class="text-secondary" style="font-size: 10px;"> 
                                    #{{ $venta->productos->id }} 
                                </span>
                                <p class="" style="font-size: 17px;">
                                    <a href="{{ route('productos.show', $venta->productos->id) }}" class="text-dark no-link">
                                        {{ $venta->productos->name }}
                                    </a>
                                </p>
                                <span class="text-secondary" style="font-size: 13px;">
                                    {{ $venta->productos->stock }} Unidades | {{ $venta->transaccions->count() }} Ventas
                                </span>
                            </div>

                            <div class="col-2 mt-5">
                                <span class="text-secondary">
                                    U$S{{ $venta->productos->precio }}
                                </span>
                            </div>

                            <div class="col-2 mt-5">
                                <span class="text-secondary">
                                    @foreach ($venta->transaccions as $transaccion)
                                        {{ $transaccion->compras->cantidad }} u.
                                    @endforeach
                                </span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-4" style="margin-top: -16px;">
                <ul class="lista w-100 h-100">
                    <li class="lista-item h-100" style="background-color: rgba(192, 192, 192, 0.178); border: transparent;">
                        <div class="align-self-center mt-5">
                            <p class="mt-3"><b>Detalle de cobro</b></p>

                            <br>
                            <hr>
                            
                            @foreach ($venta->transaccions as $transaccion)

                                <div class="row">
                                    <div class="col-8 text-left">
                                        <p>Producto</p>
                                        <p>x {{ $transaccion->compras->cantidad }} Unidades</p>
                                        <p class="mt-2">Envio</p>
                                    </div>
                                    <div class="col-2 text-right">
                                        <p class="text-secondary">U$S{{ $venta->productos->precio }}</p>
                                        <p class="text-secondary">U$S{{ $venta->productos->precio * $transaccion->compras->cantidad}}</p>
                                        @if (@$venta->precio_envio)
                                            <p class="text-secondary">U$S{{ $venta->precio_envio }}</p>
                                        @else
                                            <p class="text-secondary">---</p>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-8 text-left">
                                        <b><p>Total</p></b>
                                    </div>
                                    <div class="col-2 text-right">
                                        <b><p class="text-secondary">U$S{{ $venta->productos->precio * $transaccion->compras->cantidad + $venta->precio_envio }}</p></b>
                                    </div>
                                </div>
                            
                            @endforeach
                            
                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </div>

@endsection