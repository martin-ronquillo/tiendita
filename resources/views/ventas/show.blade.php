@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ventas_show.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12">
            <h3 class="mt-5"><b>Publicaciones</b></h3>
            <br>
            <br>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12">
            {{--Contactos por responder Y Publicaciones--}}
                <div class="row">
                    
                    @foreach ($ventas as $venta)

                        <div class="col-12 mt-3">
                            {{--Contactos por responder--}}
                            <div class="card no-border">

                                <div class="card-body" style="background-color: transparent;">
                                    <div class="row">

                                        <div class="col-3">
                                            
                                            <div class="img-content-compras text-center">
                                                <img class="img-compras" src="{{ $venta->productos->images->first()->url }}" alt="{{ $venta->productos->name }}">
                                            </div>

                                        </div>

                                        <div class="col-4 mt-2">
                                            <span class="text-secondary" style="font-size: 10px;"> 
                                                #{{ $venta->productos->id }} 
                                            </span>
                                            <p class="" style="font-size: 17px;">
                                                <a href="" class="text-dark no-link">
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

                                        <div class="col-3 mt-4">
                                            <span>
                                                {{ $venta->estado }} - Gratuita
                                            </span>
                                            <p class="text-secondary">
                                                Tiene exposicion minima                                                
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                    
                        </div>
                        
                    @endforeach

                </div>
        
        </div>        

    </div>
</div>
@endsection