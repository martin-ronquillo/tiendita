@extends('layouts.app')

@php
    @$ventasTot = App\Venta::where('user_id', $producto->ventas->first()->users->id)->get();

    //Obtener el total de ventas concretadas del vendedor
        @$vendido = 0;

        //Si el vendedor tiene mas de 0 ventas
        if (@$ventasTot->count() >= 1) {
            
            foreach (@$ventasTot as $key) {
                //Si la venta tiene una transaccion
                if (@$key->transaccions->count() > 0) {
                    
                    foreach ($key->transaccions as $transaccion) {
                        //Si la transaccion esta concretada
                        if ($transaccion->estado == 'concretada') {
                            $vendido += 1;
                        }

                    }

                }
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
                <a href="{{ route('home') }}" class="">
                    Seguir Comprando!
                </a>
            </div>
            {{--Imagen, caracteristicas, Descripcion y P&R--}}
                <div class="row col-sm-12 col-md-12 col-lg-8 mt-1">

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
                <div class="row col-sm-12 col-md-12 col-lg-4 mt-1">

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
                                            @if (@$producto->ventas->first()->estado === 'activo')
                                                <div class="col-2">
                                                    <i style="margin-right: auto">
                                                        @livewire('favoritos-component', ['identificador' => $producto->id])
                                                    </i>
                                                </div>
                                            @endif
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

                                        {{--Formulario comprar--}}
                                        @if (@$producto->ventas->first()->estado === 'activo')

                                            @if (Auth::user() === Null || @$producto->ventas->first()->users->id !== Auth::user()->id)
                                                
                                                <form action=" {{ route('compras.confirma-metodos') }} " method="GET">

                                                    <input type="hidden" name="producto" value="{{ $producto->id }}">

                                                    <p class="text-secondary mt-3">
                                                        Cantidad:
                                                        <select name="cantidad" id="" class="no-arrow">
                                                            <option value="1" selected>1 Unidad</option>

                                                            @for ($i = 2; $i <= $producto->stock; $i++)
                                                                @if ($i > 6)
                                                                    @break;
                                                                @endif
                                                                <option value="{{$i}}">{{$i}} Unidades</option>
                                                            @endfor

                                                            @if ($producto->stock > 6 )
                                                                <option value="mas">+ de 6 unidades</option>
                                                            @endif

                                                        </select>
                                                        <em class="text-secondary">({{ $producto->stock }} disponibles)</em>
                                                    </p>
                                                    <div >
                                                        <button type="submit" class="btn btn-block btn-primary btn-lg text-light">
                                                            Comprar
                                                        </button>
                                                    </div>
                                                </form>
                                            
                                            @else

                                                <div 
                                                class="mb-5"
                                                style="
                                                background-color: rgba(128, 128, 128, 0.075); 
                                                height: 50px; 
                                                padding: 11px;
                                                border-radius: 6px;
                                                ">
                                                    <a href="{{ route('ventas.edit', $producto->id) }}" class="text-primary"><u>Puedes editar tu publicacion cuando quieras!</u></a>
                                                </div>

                                            @endif
                                        
                                        @else
                                            
                                            <div 
                                            class="mb-5"
                                            style="
                                            background-color: rgba(128, 128, 128, 0.075); 
                                            height: 50px; 
                                            width: 180px;
                                            padding: 11px;
                                            border-radius: 6px;
                                            ">
                                                <span class="text-secondary">
                                                    <i class="fas fa-exclamation-circle" style="color: rgba(255, 68, 0, 0.575);"></i>
                                                    Publicacion finalizada
                                                </span>
                                            </div>

                                        @endif

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
            {{--Footer--}}
            <div class="col-12 mt-2 text-right" style="margin-left: -50px;">
                <span class="text-secondary">Publicacion #</span><em>{{ $producto->id }}</em>
            </div>

        </div>

    </div>

@endsection