@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/respuestas.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12 mt-4">
            <span class="text-secondary" style="font-size: 15px;">
                Ventas
            </span> 
            <span style="font-size: 15px;"> 
                > Preguntas
            </span>
            <br>
            <br>
        </div>

        <div class="col-12 mt-4">
            <em style="color: black;">
                <div class="info">
                    <div class="row">
                        <div class="col-1">
                            <i class="fas fa-info-circle fa-2x mt-2 ml-2 text-primary"></i>
                        </div>
                        <div class="col-9">
                            En tus publicaciones de productos, no incluyas datos de contacto, como e-mails, teléfonos, direcciones, 
                            links externos y redes sociales.
                        </div>
                        <div class="col-2">
                            <button type="button" class="no-btn mt-2" data-toggle="modal" data-target=".bd-example-modal-lg" style="color: blue;">
                                Ver consejos
                            </button>
                        </div>
                    </div>
                </div>
            </em>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12">

            {{--Componente para responder preguntas--}}
                @php
                    $existen_preguntas = 0;
                @endphp

                @foreach ($ventas as $venta)
                    @foreach ($venta->productos->preguntas as $preguntas)
                        @if (!$preguntas->respuestas)

                            @php
                                $existen_preguntas++;
                            @endphp

                        @endif
                    @endforeach
                @endforeach

                @if (@$existen_preguntas >= 1)

                    @livewire('responder-component', ['ventas' => $ventas])

                @else

                    <div class="card no-border mt-4">

                        <div class="card-body" style="background-color: transparent;">
                    
                            <h5 class="mt-2 ml-5 mr-5">Aun no has recibido preguntas en tus publicaciones, <a href="{{ route('ventas.create') }}">publica algo</a> para tener mas suerte...</h5>
                        
                        <div>

                    </div>
                    
                @endif

        </div>        

    </div>
</div>

{{--Modal de consejos para responder preguntas--}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="row" style="padding: 20px;">

                        <div class="col-11 mb-4">
                            <h3 class="modal-title" id="exampleModalLabel"><b>Consejos para responder mejor tus preguntas</b></h3>
                        </div>

                        <div class="col-1">
                            <button type="button" class="close mt-1" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{--Primera--}}
                        <div class="col-1 text-center text-success mt-4">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="col-8 mt-4" style="font-size: 16px;">
                            <span class="">
                                Respóndelas en detalle. Una vez que las envíes desaparecerán del listado y no podrás editarlas.
                            </span>
                        </div>

                        <div class="col-3">

                        </div>
                        {{--Segunda--}}
                        <div class="col-1 mt-4 text-center text-success">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="col-8 mt-4" style="font-size: 16px;">
                            <span class="">
                                Ten siempre un trato respetuoso con la comunidad.
                            </span>
                        </div>

                        <div class="col-3">

                        </div>
                        {{--Tercera--}}
                        <div class="col-1 mt-4 text-center text-danger">
                            <i class="fas fa-times"></i>
                        </div>

                        <div class="col-8 mt-4" style="font-size: 16px;">
                            <span class="">
                                No ingreses ni solicites datos de contacto, como e-mails, teléfonos, direcciones, links externos y redes sociales.
                            </span>
                        </div>

                        <div class="col-3">

                        </div>
                        {{--Cuarta--}}
                        <div class="col-1 mt-4 text-center text-danger">
                            <i class="fas fa-times"></i>
                        </div>

                        <div class="col-8 mt-4" style="font-size: 16px;">
                            <span class="">
                                No pidas que te oferten en publicaciones que no sean de Mercado Libre.
                            </span>
                        </div>

                        <div class="col-3">

                        </div>
                        {{--Quinta--}}
                        <div class="col-1 mt-4 text-center text-danger">
                            <i class="fas fa-times"></i>
                        </div>

                        <div class="col-8 mt-4" style="font-size: 16px;">
                            <span class="">
                                Está prohibido insinuar a tu comprador que no aceptas Mercado Pago.
                            </span>
                        </div>

                        <div class="col-3">

                        </div>
                        {{--Boton--}}
                        <div class="col-12 mt-5">
                            <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Entendido</span>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection