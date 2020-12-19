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

                @php
                    $transacciones = 0;
                @endphp
                @foreach ($ventas as $venta)

                    @if ($venta->transaccions)

                        @php
                            $transacciones++;
                        @endphp

                    @endif

                @endforeach

                @if ($transacciones >= 1)
                    
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
                                                            @if (@$venta->productos->images->first())
                                                                <img class="img-compras" src="{{ $venta->productos->images->first()->url }}" alt="{{ $venta->productos->name }}">
                                                            @else
                                                                <img class="img-compras" src="{{ asset('images/no-image.png') }}" alt="no-image">
                                                            @endif
                                                        </div>
            
                                                    </div>
            
                                                    <div class="col-4 mt-2">
                                                        <span class="text-secondary" style="font-size: 10px;"> 
                                                            #{{ $venta->productos->id }} 
                                                        </span>
                                                        <p class="" style="font-size: 17px;">
                                                            <a href="{{ route('ventas.edit', $venta->id) }}" class="text-dark no-link">
                                                                {{ $venta->productos->name }}
                                                            </a>
                                                        </p>
                                                        <span class="text-secondary" style="font-size: 13px;">
                                                            @foreach ($venta->transaccions as $transaccion)
                                                                {{ $transaccion->compras->cantidad }} Unidades
                                                            @endforeach
                                                        </span>
                                                    </div>
            
                                                    <div class="col-2 mt-5">
                                                        <span class="text-secondary">
                                                            @foreach ($venta->transaccions as $transaccion)
                                                                U$D{{ $venta->productos->precio * $transaccion->compras->cantidad + $venta->precio_envio }}
                                                            @endforeach
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
                
                @else
                    
                    <div class="card no-border">

                        <div class="card-body" style="background-color: transparent;">
                    
                            <h5 class="mt-2 ml-5 mr-5">Aun no has vendido nada, puedes probar <a href="{{ route('ventas.create') }}">publicando algo...</a></h5>
                        
                        <div>

                    </div>
                
                @endif
        
        </div>        

    </div>
</div>
@endsection