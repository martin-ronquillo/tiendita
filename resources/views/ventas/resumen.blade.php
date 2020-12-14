@php
//Estadisticas de ventas
    //Obtener el total de preguntas sin responder
        $tot_preguntas = 0;
        foreach ($ventas as $venta) {
            foreach ($venta->productos->preguntas as $preguntas) {
                if (!$preguntas->respuestas) {
                    $tot_preguntas++;
                }
            }
        }

    //Obtener el numero de ventas suspendidas y las ventas sin calificacion
        $ventas_suspendidas = 0;
        $ventas_inconclusas = 0;
        foreach ($ventas as $venta) {

            if ($venta->estado === 'suspendido') {
                $ventas_suspendidas++;
            }
            
            foreach ($venta->transaccions as $transaccion) {
                
                if ($transaccion->estado !== 'concretada') {
                    $ventas_inconclusas++;
                }

            }

        }

    //Crece como vendedor: 
        //Completa tu cuenta
        $user_profile = 99.9;
        if ($user->apellido_mater === Null) {
            $user_profile = $user_profile - 11.1;
        }
        if ($user->direc === Null) {
            $user_profile = $user_profile - 11.1;
        }
        if ($user->tlf === Null) {
            $user_profile = $user_profile - 11.1;
        }
        if ($user->picture === Null) {
            $user_profile = $user_profile - 11.1;
        }
        //Progresa como vendedor
        $user_ventas = 0;
        if ($user->ventas->count() >= 1) {
            $user_ventas = $user_ventas + 25;
        }
        if ($user->ventas->count() >= 10) {
            $user_ventas = $user_ventas + 25;
        }
        if ($user->ventas->count() >= 30) {
            $user_ventas = $user_ventas + 25;
        }
        if ($user->ventas->count() >= 70) {
            $user_ventas = $user_ventas + 25;
        }
    
    //Metricas de venta
        //Calcular las ganacias totales de ventas 
        $tot_ventas = 0;
        $envios = 0;
        $ganancias = 0;
        $iva = 0;
        $ganancias_iva = 0;
        $porcentaje_ganancias = 0;
        foreach ($ventas as $venta) {
            foreach ($venta->productos->compras as $compra) {
                $envios = $envios + $compra->precio_envio;
                $tot_ventas = $tot_ventas + $compra->tot_compra;
            }
        }
        $ganancias = $tot_ventas - $envios;
        $iva = $ganancias * 0.12;
        $ganancias_iva = $ganancias - $iva;
        if ($ganancias_iva != 0 && $ganancias != 0) {
            $porcentaje_ganancias = ($ganancias_iva / $ganancias) * 100;
        } else {
            $porcentaje_ganancias = 0;
        }
        //Cantidad de ventas
        $ventas_finalizadas = 0;
        foreach ($ventas as $venta) {
            foreach ($venta->transaccions as $transaccion) {
                if ($transaccion->estado === 'concretada') {
                    $ventas_finalizadas++;
                }
            }
        }
        if ($ventas_finalizadas != 0 && $ventas->count() != 0) {
            $ventas_finalizadas_porcentaje = ($ventas_finalizadas / $ventas->count()) * 100;
        } else {
            $ventas_finalizadas_porcentaje = 0;
        }
        

@endphp
@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/favoritos.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12">
            <h3 class="mt-5"><b>Resumen</b></h3>
            <br>
            <br>
            <span class="text-secondary">Tus pendientes</span>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-4">
            {{--Contactos por responder Y Publicaciones--}}
                <div class="row">
                    
                    <div class="col-12 mt-3">
                        {{--Contactos por responder--}}
                        <div class="card no-border">

                            <div class="card-header" style="background-color: transparent;">
                                <h5><b>Contactos por responder</b></h5>
                            </div>

                            @if ($tot_preguntas >= 1)
                                <a href="{{ route('preguntas.responder', Auth::user()->id) }}" class="no-link-card">
                                    <div class="card-footer" style="background-color: transparent;">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-secondary">Preguntas</span> 
                                            </div>
                                            <div class="col-3 text-right text-dark">
                                                <span class="text-secondary">{{ $tot_preguntas }} &nbsp; ></span> 
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <div class="card-footer" style="background-color: transparent;">
                                    <span class="text-secondary">No tienes preguntas, mensajes ni reclamos por responder.</span>
                                </div>
                            @endif

                        </div>
                
                    </div>

                    <div class="col-12 mt-3">
                        {{--Publicaciones--}}
                        <div class="card no-border">

                            <div class="card-header" style="background-color: transparent;">
                                <h5><b>Publicaciones</b></h5>
                            </div>

                            @if ($ventas_suspendidas >= 1)
                                
                                <div class="card-body">
                                    <span class="text-secondary">Tienes {{ $ventas_suspendidas }} ventas suspendidas.</span>
                                </div>
                                <a href="{{ route('ventas.show', Auth::user()->id) }}" class="no-link-card">
                                    <div class="card-footer" style="background-color: transparent;">
                                        <div class="row">
                                            <div class="col-10 text-primary">
                                                <b>Ir a publicaciones</b> 
                                            </div>
                                            <div class="col-1 text-right text-primary">
                                                <b>></b> 
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            @else

                                <div class="card-body">
                                    <span class="text-secondary">No tienes tareas de publicaciones.</span>
                                </div>
                                <a href="{{ route('ventas.show', Auth::user()->id) }}" class="no-link-card">
                                    <div class="card-footer" style="background-color: transparent;">
                                        <div class="row">
                                            <div class="col-10 text-primary">
                                                <b>Ir a publicaciones</b> 
                                            </div>
                                            <div class="col-1 text-right text-primary">
                                                <b>></b> 
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            @endif

                        </div>
                
                    </div>

                </div>
        
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            {{--Ventas y Crecer como vendedor--}}
                <div class="row">

                    <div class="col-12 mt-3">
                        {{--Ventas--}}
                        <div class="card no-border">

                            <div class="card-header" style="background-color: transparent;">
                                <h5><b>Ventas</b></h5>
                            </div>

                            @if ($ventas_inconclusas >= 1)

                                <div class="card-body">
                                    <span class="text-secondary">Tienes {{ $ventas_inconclusas }} ventas no concretadas por tus compradores.</span>
                                </div>

                                <a href="{{ route('ventas.ventas', Auth::user()->id) }}" class="no-link-card">
                                    <div class="card-footer" style="background-color: transparent;">
                                        <div class="row">
                                            <div class="col-10 text-primary">
                                                <b>Ver ventas</b> 
                                            </div>
                                            <div class="col-1 text-right text-primary">
                                                <b>></b> 
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            @else

                                <div class="card-body">
                                    <span class="text-secondary">No tienes ventas por preparar.</span>
                                </div>

                                <a href="{{ route('ventas.ventas', Auth::user()->id) }}" class="no-link-card">
                                    <div class="card-footer" style="background-color: transparent;">
                                        <div class="row">
                                            <div class="col-10 text-primary">
                                                <b>Ver ventas</b> 
                                            </div>
                                            <div class="col-1 text-right text-primary">
                                                <b>></b> 
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            @endif

                        </div>
                
                    </div>

                    <div class="col-12 mt-3">
                        {{--Crecer como vendedor--}}
                        <div class="card no-border">

                            <div class="card-header" style="background-color: transparent;">
                                <h5><b>Crece como vendedor</b></h5>
                            </div>

                            <a href="{{ route('users.datos', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-6 text-primary">
                                            <br>
                                            <span class="text-dark">Completa tu cuenta</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <br>
                                            <span class="text-secondary">{{ round($user_profile) }}%</span>
                                        </div>
                                        <div class="col-12 text-right text-primary">
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ round($user_profile) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('ventas.progresar') }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-8 text-primary">
                                            <br>
                                            <span class="text-dark">Progresa como vendedor</span>
                                        </div>
                                        <div class="col-4 text-right">
                                            <br>
                                            <span class="text-secondary">{{ $user_ventas }}%</span>
                                        </div>
                                        <div class="col-12 text-right text-primary">
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $user_ventas }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <br>

                            <span class="ml-3"><b>Tu proximo objetivo</b></span>

                            <br>

                            <a href="" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-10 text-primary">
                                            <span class="text-secondary">Aumenta la exposicion de tu publicacion.</span> 
                                        </div>
                                        <div class="col-1 text-right text-primary">
                                            <b>></b> 
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                
                    </div>

                </div>

        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
            {{--Metricas de ventas--}}
                <div class="card no-border">
                    <div class="card-body">
                        <span class="text-primary"><b>Metricas de ventas</b></span>
                        <br>
                        <br>
                        <div class="row">

                            <div class="col-7">
                                <span class="text-secondary" style="font-size: 12px;">Ventas brutas</span>
                                <br>
                                <span style="font-size: 12px;">
                                    <b>U$S {{ bcdiv($ganancias_iva, '1', 2) }}</b>
                                    &nbsp;&nbsp;
                                    <span class="text-secondary">{{ $porcentaje_ganancias }}%</span>
                                </span>
                            </div>
                            <div>
                                <span class="text-secondary" style="font-size: 12px;">Cantidad de ventas</span>
                                <br>
                                <span style="font-size: 12px;">
                                    <b>{{ $ventas_finalizadas }}</b>
                                    &nbsp;&nbsp;
                                    <span class="text-secondary">{{ $ventas_finalizadas_porcentaje }}%</span>
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </div>
    
        </div>

        

    </div>
</div>
@endsection