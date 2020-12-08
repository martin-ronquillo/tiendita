@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ventas_show.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12">
            <h3 class="mt-5"><b>Ventas</b></h3>
            <br>
            <br>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12">
            {{--Contactos por responder Y Publicaciones--}}
                <div class="row">
                    
                    @foreach ($ventas as $venta)

                        @if ($venta->transaccions)

                            @foreach ($venta->transaccions as $transaccion)
                            
                                <div class="col-12 mt-3">
                                    {{--Contactos por responder--}}
                                    <div class="card no-border">
        
                                        <div class="card-header" style="background-color: white;">
                                            <div class="row">
                                                
                                                <div class="col-6 mt-4">
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

                                                <div class="col-3 mt-4">

                                                    <a 
                                                    href="{{ route('ventas.detalle', $venta->id) }}" 
                                                    class="btn text-primary" 
                                                    style="
                                                    width: 200px;
                                                    border: solid 1px rgba(26, 97, 145, 0.623);
                                                    ">
                                                        Ver detalle
                                                    </a>
                                                </div>

                                                <div class="col-1 mt-4">
                                                    <i class="fas fa-user-circle fa-3x text-secondary"></i>
                                                </div>
        
                                                <div class="col-2 mt-4" style="margin-left: -20px;">
                                                    <span class="text-secondary" style="font-size: 12px;">
                                                        {{ $transaccion->compras->users->name }} {{ $transaccion->compras->users->apellido_pater }}
                                                    </span>
                                                    <p class="text-secondary">
                                                        {{ $transaccion->compras->users->email }}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
        
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
                                                    <span class="text-success">
                                                        Envio {{ $venta->envios->metodo }}
                                                    </span>
                                                </div>
        
                                            </div>
                                        </div>
        
                                    </div>
                            
                                </div>
                                
                            @endforeach

                        @endif

                        

                        
                        
                    @endforeach

                </div>
        
        </div>        

    </div>
</div>
@endsection