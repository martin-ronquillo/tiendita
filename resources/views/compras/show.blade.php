@extends('layouts.app')

@section('title', 'Mis compras')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-12 col-md-2">
                <span class="">asdasdfasfasdf</span>
            </div>
    
            <div class="col-sm-12 col-md-10" 
                style="
                background-color: rgba(255, 255, 255, 0.884); 
                margin-top: -16px; 
                padding-bottom: 30px;
            ">
                <ul class="lista w-100 h-100">
                    <li class="lista-item-non-border h-100">

                        <h2 class="mt-5 ml-5"><b>Compras</b></h2>
        
                        @if (@$compras->count() >= 1)
        
                            @foreach ($compras as $item)
        
                                <div class="card mt-4 ml-5 mr-5" style="height: 250px;">
                                    <div class="card-body ml-3">
        
                                        @foreach ($item->transaccions as $transacciones)
                                            
                                            @if (@$transacciones->estado === Null)
                                                <h5><b>Acuerdas el pago y la entrega</b></h5>
                                                <em class="text-secondary">Contactate con el vendedor para concretar la compra</em>
                                            @endif

                                            @if (@$transacciones->estado === 'concretada')
                                                <h5><b>Entregado</b></h5>
                                                <em class="text-secondary">El {{ $transacciones->confirmacion }} nos avisaste que lo tienes</em>
                                            @endif

                                            @if (@$transacciones->estado === 'no concretada')
                                                <h5><b>Declinado</b></h5>
                                                <em class="text-secondary">Decidiste no adquirir este producto</em>
                                            @endif

                                            @if (@$transacciones->estado === 'problema')
                                                <h5><b>Problemas con la compra o el envio</b></h5>
                                                <em class="text-secondary">Tuviste inconvenientes con el vendedor al momento de adquirir este producto</em>
                                            @endif

                                            <div class="row mt-5">

                                                <div class="col-2">

                                                    <div class="img-content-compras text-center">
                                                        <img class="img-compras" src="{{ $item->productos->images->first()->url }}" alt="{{ $item->productos->name }}">
                                                    </div>

                                                </div>

                                                <div class="col-4" style="margin-left: -30px;">

                                                    <a href="{{ route('productos.show', $item->productos->id) }}">{{ $item->productos->name }}</a>
                                                    <br>
                                                    <span class="text-secondary">U$S {{ $item->productos->precio }} x {{ $item->cantidad }} unidades</span>

                                                </div>

                                                <div class="col-1">
                                                    <i class="fas fa-user-circle fa-3x text-secondary"></i>
                                                </div>

                                                <div class="col-3" style="margin-left: -20px;">
                                                    <b>Vendedor</b>
                                                    <br>
                                                    <span class="text-secondary">
                                                        {{ $item->transaccions->first()->ventas->users->name }} {{ $item->transaccions->first()->ventas->users->apellido_pater }}
                                                    </span>
                                                </div>

                                                <div class="col-2 text-right">

                                                    <ul class="navbar-nav ml-auto menu">
                                                        
                                                        @if (@$transacciones->estado === Null)
                                                            <li class="nav-item dropdown">
                                                                <a id="navbarDropdown text-dark" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    <i class="fas fa-ellipsis-v text-dark"></i>
                                                                </a>
                                
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                    <a class="dropdown-item text-dark" href="{{ route('compras.calificar', $item->id) }}">
                                                                        <b>Calificar compra</b>
                                                                    </a>
                                                                    <a class="dropdown-item text-dark" href="#">
                                                                        <b>Necesito ayuda</b> 
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li class="nav-item dropdown">
                                                                <a id="navbarDropdown text-dark" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    <i class="fas fa-ellipsis-v text-dark"></i>
                                                                </a>
                                
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                    <a class="dropdown-item text-dark" href="{{ route('ventas.create') }}">
                                                                        <b>Detalle de la calificacion</b> 
                                                                    </a>
                                                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}">
                                                                        <b>Necesito ayuda</b> 
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        @endif

                                                    </ul>

                                                </div>

                                            </div>

                                        @endforeach
        
                                    </div>
                                </div>
        
                            @endforeach
        
                        @else
                            
                            <h5 class="mt-4 ml-5 mr-5">Aun no has realizado ninguna compra... <a href="{{ route('home') }}">¡Empecemos con eso!</a></h5>
        
                        @endif

                    </li>
                </ul>

            </div>
    
        </div>
    </div>

@endsection