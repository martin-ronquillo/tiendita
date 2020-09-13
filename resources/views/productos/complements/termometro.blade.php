@php
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