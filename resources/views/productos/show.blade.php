@extends('layouts.app')

@php
    @$ventasTot = App\Venta::where('user_id', $producto->ventas->first()->users->id)->get();
    @$vendido = 0;

    foreach ($ventasTot as $key) {
        if ($key->estado === 'vendido') {
            $vendido += 1;
        }
    }

@endphp
@section('title', $producto->name)
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/showProducts.css') }}">
@endsection

@section('content')
    
    <div class="container">

        <div class="row">

            <div class="col-12">
                <a href="javascript:history.back()" class="">
                    Volver al listado
                </a>
            </div>
            {{--Imagen, caracteristicas, Descripcion y P&R--}}
            <div class="row col-sm-12 col-md-12 col-lg-8 mt-3">

                <ul class="lista w-100">

                    {{--Imagen--}}
                        <li class="lista-item">

                            <div class="row">

                                @if (@$producto->images->count() > 0)
                                    
                                    {{--Carousel de imagenes--}}
                                    @include('productos.complements.carousel')

                                @else
                                
                                    <div class="col-12 img-content text-center">
                                        <img class="" src="{{ asset('images/no-image.png') }}" alt="{{ $producto->name }}">
                                    </div>

                                @endif

                            </div>
                            
                        </li>

                    {{--Caracteristicas--}}
                        <li class="lista-item">

                            <div class="row">
                                <div class="col-12 text-justify mt-4 mb-4">
                                    <p><b><h4>Caracteristicas</h4></b></p>
                                    <pre>{{ $producto->caracteristicas }}</pre>
                                    
                                </div>
                            </div>
                            
                        </li>

                    {{--Descripcion y P&R--}}
                        <li class="lista-item">

                            <div class="row">

                                {{--Descripcion--}}
                                <div class="col-12 text-justify mt-4 mb-4">
                                    <p><b><h4>Descripcion</h4></b></p>
                                    <pre>{{ $producto->descripcion }}</pre>
                                </div>

                                {{--Preguntas--}}
                                @livewire('preguntar-component', ['product' => $producto->id])
                            </div>
                            
                        </li>

                </ul>

            </div>
            {{--Lista derecha info--}}
            <div class="row col-sm-12 col-md-12 col-lg-4 mt-3">

                <ul class="lista w-100">

                    {{--Primera seccion--}}
                        <li class="lista-item">
                            <div class="row">
                                <div class="ml-3 mr-1 w-100">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="mt-1 mb-2 text-secondary text-capitalize">
                                                {{ $producto->estado }} - {{ $producto->ventas->first()->transaccions->count() }} vendidos
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <i style="margin-right: auto">
                                                @livewire('favoritos-component', ['identificador' => $producto->id])
                                            </i>
                                        </div>
                                    </div>
                                    <h3 class="text-calibri text-capitalize"><b>{{ $producto->name }}</b></h3>
                                    <br>
                                    <h1 class="display-5 text-price">U$S {{ $producto->precio }}</h1>
                                    <br>
                                    <p>
                                        <i class="far fa-user fa-2x mr-3"></i>
                                        Pago {{ @$producto->ventas->first()->pagos->metodo }}
                                    </p>
                                    <p class="text-success">
                                        <i class="fas fa-truck fa-2x mr-2 mt-3"></i>
                                        Envio {{ @$producto->ventas->first()->envios->metodo }}
                                        <br>
                                        <i class="text-secondary ml-5">
                                            {{ @$producto->ventas->first()->users->provincias->name }}
                                        </i>
                                    </p>
                                    <p class="text-secondary mt-3">
                                        Cantidad:
                                        <select name="" id="" class="no-arrow">
                                            <option value="relevante" selected>1 Unidad</option>
                                            <option value="mayor">2 Unidades</option>
                                            <option value="menor">3 Unidades</option>
                                            <option value="menor">4 Unidades</option>
                                            <option value="menor">5 Unidades</option>
                                            <option value="menor">6 Unidades</option>
                                        </select>
                                        <em class="text-secondary">({{ $producto->stock }} disponibles)</em>
                                    </p>
                                    <div >
                                        <a href="#" class="btn btn-block btn-primary btn-lg text-light">
                                            Comprar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    
                    {{--Segunda seccion--}}
                        <li class="lista-item">
                            <div class="row">
                                <div class="ml-3 mt-4">
                                    <h5><b>Informacion sobre el vendedor</b></h5>
                                    <br>
                                    <p>
                                        <i class="fas fa-map-marker-alt fa-2x mr-3"></i>
                                        Ubicacion
                                        <br>
                                        <i class="text-secondary ml-5">
                                            {{ @$producto->ventas->first()->users->provincias->name }}
                                        </i>
                                    </p>
                                    @if (@$vendido >= 15)
                                        <p class="text-success">
                                            <i class="fas fa-trophy fa-2x mr-2 mt-3"></i>
                                            MercadoLider Gold
                                            <br>
                                            <i class="text-secondary ml-5">
                                                ¡Es uno de los mejores del sitio!
                                            </i>
                                        </p>
                                    @endif
                                </div>
                                
                                {{--Termometro de calificaciones--}}
                                @if (@$producto->ventas->first()->users->opinions)
                                    @if (@$producto->ventas->first()->users->opinions->count() >= 1)
                                        
                                        @include('productos.complements.termometro')
                                    
                                    @else
                                        <i class="text-secondary ml-3 mt-4">
                                            Este vendedor aún no tiene suficientes ventas para calcular su reputación.
                                        </i>
                                    @endif
                                @endif
                            </div>
                        </li>

                    {{--Tercera seccion--}}
                        <li class="lista-item h-100">

                        </li>

                </ul>

            </div>

        </div>

    </div>

@endsection