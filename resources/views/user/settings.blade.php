@extends('layouts.app')

@section('title', 'Panel')
@section('styles2')
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-12 col-md-2">
                <span class="ml-2 text-secondary">
                    <h4>
                        <i class="fas fa-bars mr-3"></i>
                        Mi cuenta
                    </h4>
                </span>
                <div class="accordion" id="accordionExample">
                    <div class="card personal">
                        <div class="card-header personal" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn text-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-shopping-bag mr-1"></i>
                                Compras
                            </button>
                            </h5>
                        </div>
                  
                        <div id="collapseOne" class="collapse{{ $show_compras }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body" style="padding-left: 53px; margin-top: -20px;">
                                <a href="{{ route('compras.show', Auth::user()->id) }}" class="no-link" style="color: {{ @$selected1 }};">Compras</a>
                                <br>
                                <a href="{{ route('preguntas.show', Auth::user()->id) }}" class="no-link" style="color: {{ @$selected2 }};">Preguntas</a>
                                <br>
                                <a href="{{ route('favoritos.show', Auth::user()->id) }}" class="no-link" style="color: {{ @$selected3 }};">Favoritos</a>
                            </div>
                        </div>
                    </div>
                    <div class="card personal">
                        <div class="card-header personal" id="headingTwo">
                            <h5 class="mb-0">
                            <button class="btn text-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fas fa-store-alt mr-1"></i>
                                Ventas
                            </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse{{ $show_ventas }}" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body" style="padding-left: 53px; margin-top: -20px;">
                                <a href="{{ route('ventas.resumen', Auth::user()->id) }}" class="no-link" style="color: {{ @$selected4 }};">Resumen</a>
                                <br>
                                <a href="{{ route('ventas.show', Auth::user()->id) }}" class="no-link" style="color: {{ @$selected5 }};">Publicaciones</a>
                                <br>
                                <a href="{{ route('preguntas.responder', Auth::user()->id) }}" class="no-link" style="color: {{ @$selected6 }};">Preguntas</a>
                                <br>
                                <a href="" class="no-link">Ventas</a>
                            </div>
                        </div>
                    </div>
                    <div class="card personal">
                        <div class="card-header personal" id="headingThree">
                            <h5 class="mb-0">
                            <button class="btn text-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fas fa-cog mr-1"></i>
                                Configuracion
                            </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse{{ $show_configuracion }}" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body" style="padding-left: 53px; margin-top: -20px;">
                                <a href="" class="no-link" style="color: {{ @$selected7 }};">Mis datos</a>
                                <br>
                                <a href="" class="no-link" style="color: {{ @$selected8 }};">Seguridad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('panel')
        
        </div>
    </div>

@endsection