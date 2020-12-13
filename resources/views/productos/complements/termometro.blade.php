@php
    //Calcular la reputacion del vendedor
        $positivo = 0;
        $negativo = 0;
        $neutral = 0;

        $calificaciones = App\Opinion::where('user_id', $producto->ventas->first()->users->id)->get();

        foreach ($calificaciones as $key) {

            if ($key->tipo === 'Positivo') {
                $positivo+= 1;
            }
            if ($key->tipo === 'Negativo') {
                $negativo+= 1;
            }
            if ($key->tipo === 'Neutral') {
                $neutral+= 1;
            }

        }

        if ($calificaciones->count() > 0) {
            $promedioPosi = ($positivo/$calificaciones->count()) * 100;
            $promedioNega = ($negativo/$calificaciones->count()) * 100;
            $promedioNeut = ($neutral/$calificaciones->count()) * 100;
            $recomendado = round($promedioPosi);

            if($promedioPosi > $promedioNega && $promedioPosi > $promedioNeut){

                $promedioPosi = 1;
                $promedioNega = 0;
                $promedioNeut = 0;

            }

            if($promedioNega > $promedioPosi && $promedioNega > $promedioNeut){

                $promedioNega = 1;
                $promedioNeut = 0;
                $promedioPosi = 0;

            }

            if($promedioNeut > $promedioNega && $promedioNeut > $promedioPosi){

                $promedioNeut = 1;
                $promedioPosi = 0;
                $promedioNega = 0;

            }
            
            if ($promedioPosi == $promedioNega 
                && $promedioPosi == $promedioNeut
                && $promedioNeut == $promedioNega) {

                    $promedioNeut = 1;
                    $promedioPosi = 0;
                    $promedioNega = 0;
            }
        }

    //Calcular datos de ventas del vendedor
        $i = 0;
        $date = date("Y-m-d");
        $mantenimientos = 0;
        //resta los dias actuales menos los dias de la fecha final para obtener los dias restantes
        $diff = abs(strtotime($date) - strtotime(@$producto->ventas->first()->users->created_at));
        //convertir a años
        $years = floor($diff / (365*60*60*24));
        //convertir a meses
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //convertir a dias
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    
@endphp

<ul class="reputation-thermometer mt-4 mb-4">
    @if (@$promedioNega)
        <li 
        class="reputation-thermometer-1" 
        style="border: 2px solid black;
                height: 15px;
                margin-top: -3px;"
        title="Reputacion Negativa"
        >
        </li>
    @else
        <li 
        class="reputation-thermometer-1"
        style="background-color: rgba(255, 0, 0, 0.219);"
        title="Reputacion Negativa"
        >
        </li>
    @endif

    @if (@$promedioNeut)
        <li 
        class="reputation-thermometer-3" 
        style="border: 2px solid black;
                height: 15px;
                margin-top: -3px;"
        title="Reputacion Neutra"
        >
        </li>
    @else
        <li 
        class="reputation-thermometer-3"
        style="background-color: rgba(255, 255, 0, 0.233);"
        title="Reputacion Neutra"
        >
        </li>
    @endif

    @if (@$promedioPosi)
        <li class="reputation-thermometer-5" 
        style="border: 2px solid black;
                height: 15px;
                margin-top: -3px;"
        title="Reputacion Positiva"
        >
        </li>
    @else
        <li 
        class="reputation-thermometer-5"
        style="background-color: rgba(0, 128, 0, 0.315);"
        title="Reputacion Positiva"
        >
        </li>
    @endif
    
</ul>

<ul class="reputation-thermometer w-100">
    <li class="reputation-data text-center w-100">

        <h5>{{ $recomendado }}%</h5>
        <h6><em class="text-secondary size">de los compradores lo recomiendan</em></h6>
    
    </li>
    <div class="vertical-divider"></div>
    <li class="reputation-data text-center w-100">
        
        @if (@$years >= 1)

            <h5>{{ $years }} años</h5>
            <h6><em class="text-secondary size">vendiendo en mercadolibre</em></h6>

        @else

            @if (@$months >= 1 && @$months <= 11)

                <h5>{{ $months }} meses</h5>
                <h6><em class="text-secondary size">vendiendo en mercadolibre</em></h6>

            @else

                @if (@$days >= 0 && @$days <= 31)

                    <h5>{{ $days }} dias</h5>
                    <h6><em class="text-secondary size">vendiendo en mercadolibre</em></h6>

                @endif

            @endif

        @endif

    </li>
    <div class="vertical-divider"></div>
    <li class="reputation-data text-center w-100">
        
        <h5>{{ @$vendido }}</h5>
        <h6><em class="text-secondary size">ventas concretadas</em></h6>
    
    </li>
</ul>

@if (@$producto->ventas->first()->users->opinions)

    <ul class="reputation-thermometer w-100">

        <li class="reputation-data w-100">

            <button type="button" class="no-btn mt-2" data-toggle="modal" data-target=".bd-example-modal-lg" style="color: rgb(0, 132, 255);">
                Ver opiniones sobre el vendedor
            </button>

        </li>

    </ul>

    {{--Modal de opiniones--}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="row" style="padding: 20px;">

                            <div class="col-11 mb-4">
                                <h3 class="modal-title" id="exampleModalLabel"><b>Opiniones sobre el vendedor</b></h3>
                            </div>

                            <div class="col-1">
                                <button type="button" class="close mt-1" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{--Primera--}}

                            <div class="col-12">
                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: transparent;">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Todas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Positivas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Neutrales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="negativas-tab" data-toggle="tab" href="#negativas" role="tab" aria-controls="negativas" aria-selected="false">Negativas</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <br>
                                        <br>
                                        @foreach (@$producto->ventas->first()->users->opinions as $opinion)

                                            @if (@$opinion->tipo == 'Positivo')
                                                <p>
                                                    <i class="far fa-check-circle mt-2 mr-2 text-success"></i>
                                                    {{ @$opinion->opinion }}
                                                    <br>
                                                    <em class="text-secondary ml-4" style="font-size: 11px;">
                                                    {{ @App\User::where('id', $opinion->aporta_id)->first()->name }} {{ @App\User::where('id', $opinion->aporta_id)->first()->apellido_pater }}... {{ @$opinion->created_at }}
                                                    </em>
                                                </p>
                                            @endif
                                            @if (@$opinion->tipo == 'Negativo')
                                                <p>
                                                    <i class="far fa-times-circle mt-2 mr-2 text-danger"></i>
                                                    {{ @$opinion->opinion }}
                                                    <br>
                                                    <em class="text-secondary ml-4" style="font-size: 11px;">
                                                    {{ @App\User::where('id', $opinion->aporta_id)->first()->name }} {{ @App\User::where('id', $opinion->aporta_id)->first()->apellido_pater }}... {{ @$opinion->created_at }}
                                                    </em>
                                                </p>
                                            @endif
                                            @if (@$opinion->tipo == 'Neutral')
                                                <p>
                                                    <i class="far fa-dot-circle mt-2 mr-2 text-secondary"></i>
                                                    {{ @$opinion->opinion }}
                                                    <br>
                                                    <em class="text-secondary ml-4" style="font-size: 11px;">
                                                    {{ @App\User::where('id', $opinion->aporta_id)->first()->name }} {{ @App\User::where('id', $opinion->aporta_id)->first()->apellido_pater }}... {{ @$opinion->created_at }}
                                                    </em>
                                                </p>
                                            @endif

                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <br>
                                        <br>
                                        
                                        @foreach (@$producto->ventas->first()->users->opinions as $opinion)

                                            @if (@$opinion->tipo == 'Positivo')
                                                <p>
                                                    <i class="far fa-check-circle mt-2 mr-2 text-success"></i>
                                                    {{ @$opinion->opinion }}
                                                    <br>
                                                    <em class="text-secondary ml-4" style="font-size: 11px;">
                                                    {{ @App\User::where('id', $opinion->aporta_id)->first()->name }} {{ @App\User::where('id', $opinion->aporta_id)->first()->apellido_pater }}... {{ @$opinion->created_at }}
                                                    </em>
                                                </p>
                                            @endif

                                        @endforeach

                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <br>
                                        <br>
                                        
                                        @foreach (@$producto->ventas->first()->users->opinions as $opinion)

                                            @if (@$opinion->tipo == 'Negativo')
                                                <p>
                                                    <i class="far fa-times-circle mt-2 mr-2 text-danger"></i>
                                                    {{ @$opinion->opinion }}
                                                    <br>
                                                    <em class="text-secondary ml-4" style="font-size: 11px;">
                                                    {{ @App\User::where('id', $opinion->aporta_id)->first()->name }} {{ @App\User::where('id', $opinion->aporta_id)->first()->apellido_pater }}... {{ @$opinion->created_at }}
                                                    </em>
                                                </p>
                                            @endif

                                        @endforeach

                                    </div>
                                    <div class="tab-pane fade" id="negativas" role="tabpanel" aria-labelledby="negativas-tab">
                                        <br>
                                        <br>
                                        
                                        @foreach (@$producto->ventas->first()->users->opinions as $opinion)

                                            @if (@$opinion->tipo == 'Neutral')
                                                <p>
                                                    <i class="far fa-dot-circle mt-2 mr-2 text-secondary"></i>
                                                    {{ @$opinion->opinion }}
                                                    <br>
                                                    <em class="text-secondary ml-4" style="font-size: 11px;">
                                                    {{ @App\User::where('id', $opinion->aporta_id)->first()->name }} {{ @App\User::where('id', $opinion->aporta_id)->first()->apellido_pater }}... {{ @$opinion->created_at }}
                                                    </em>
                                                </p>
                                            @endif

                                        @endforeach

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
@endif