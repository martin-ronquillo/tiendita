@php
    
    //Selecciona todos los productos que contienen preguntas y 
    //los filtra para que no se repitan
    $productos = [];

    foreach (@$preguntas as $item) {
        $productos[] = @$item->productos;
    }

    @$resultadoProductos = array_unique($productos);

@endphp
@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/preguntas.css') }}">
@endsection

@section('panel')
    
    <div class="col-sm-12 col-md-10" 
        style="
        background-color: rgba(255, 255, 255, 0.884); 
        margin-top: -16px; 
        padding-bottom: 30px;
    ">

        <ul class="lista w-100 h-100">
            <li class="lista-item-non-border h-100">

                <h2 class="mt-5 ml-5"><b>Preguntas</b></h2>

                @if (@$preguntas->count() >= 1)

                    @foreach ($resultadoProductos as $item)

                        @php
                            $consulta = App\Producto::where('id', $item->id)->first();
                        @endphp

                        <div class="row mt-5 ml-4">

                            @foreach ($consulta->ventas as $venta)

                                @if ($venta->estado !== 'activo')
                                    <!-- Mensajes de notificacion -->
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                            <b>Publicacion finalizada</b>
                                        </div>
                                    </div>
                                    @break
                                @endif

                            @endforeach
                            
                            <div class="col-12">

                                <div class="img-content-compras">
                                    @if (@$consulta->images->first())
                                        <img class="img-compras" src="{{ $consulta->images->first()->url }}" alt="{{ $consulta->name }}">
                                    @else
                                        <img class="img-compras" src="{{ asset('images/no-image.png') }}" alt="no-image">
                                    @endif
                                

                                    <a href="{{ route('productos.show', $item->id) }}">&nbsp;{{ $item->name }}</a>
                                    <span class="text-danger"><b>&nbsp; U$S {{ $item->precio }}</b></span>
                                    
                                    @foreach ($consulta->ventas as $venta)

                                        @if ($venta->estado !== 'activo')
                                            <span class="text-secondary">&nbsp; <i class="far fa-clock"></i>&nbsp;La venta finalizo el {{ $venta->venta_fin }}</span>
                                            @break
                                        @endif

                                    @endforeach
                                </div>
                                
                                <hr>

                            </div>
                            
                            @foreach ($preguntas as $pregunta)

                                @if ($pregunta->producto_id === $item->id)
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-10">
                                                <i class="fas fa-comment text-primary ml-1 mr-2"></i><span class="text-secondary">{{ $pregunta->pregunta }}</span>
                                            </div>

                                            @php
                                                //Calcular cuando se hizo una pregunta
                                                    $date = date("Y-m-d");
                                                    //resta los dias actuales menos los dias de la fecha final para obtener los dias restantes
                                                    $diff = abs(strtotime($date) - strtotime(@$pregunta->created_at));
                                                    //convertir a años
                                                    $years = floor($diff / (365*60*60*24));
                                                    //convertir a meses
                                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                    //convertir a dias
                                                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                            @endphp
                                            
                                            <div class="col-2 text-right">
                                                @if (@$years >= 1)

                                                    <span class="text-secondary">&nbsp;Hace {{ $years }} años.</span>

                                                @else

                                                    @if (@$months >= 1 && @$months <= 11)

                                                        <span class="text-secondary">&nbsp;Hace {{ $months }} meses.</span>

                                                    @else

                                                        @if (@$days >= 0 && @$days <= 31)
                                                            
                                                            <span class="text-secondary">&nbsp;Hace {{ $days }} dias.</span>

                                                        @endif

                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                        
                                        <hr>
                                    </div>
                                @endif

                            @endforeach

                        </div>
                        {{--
                        <div class="col-12 text-right">
                            <button type="button" class="text-secondary no-btn" data-id="{{ $consulta->id }}" id="getDeleteId" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fas fa-trash-alt"> Eliminar</i>
                            </button>
                        </div>--}}

                    @endforeach

                @else
                    
                    <h5 class="mt-4 ml-5 mr-5">Aun no has realizado preguntas... <a href="{{ route('home') }}">¡Empecemos comprando algo!</a></h5>

                @endif

            </li>
        </ul>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mt-2 mb-2"></i>
                    <br>
                    <h2 class="mb-2">Eliminar pregunta</h2>
                    Se eliminarán todas las preguntas que hayas realizado en esta publicación.
                    <br>
                    <button type="button" class="btn btn-primary mt-2" id="SubmitDeleteProductForm">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection