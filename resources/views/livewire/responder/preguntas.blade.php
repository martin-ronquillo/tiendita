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

@if ($empty === 1)
    <a href="#pregunta{{$pregunta->id}}" class="d-block card-header py-3 border-left-info no-link pregunta" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <div class="form-row">
            <h6 class="text-dark">
                {{--Agrega una interrogacion en caso de no tenerla--}}
                @if (substr($pregunta->pregunta, -1) == '?')
                    {{ $pregunta->pregunta }}
                @else
                    {{ $pregunta->pregunta }}?
                @endif
                &nbsp;&nbsp;
                @if (@$years >= 1)

                    <span class="text-secondary" style="font-size: 10px;">&nbsp;Hace {{ $years }} años.</span>

                @else

                    @if (@$months >= 1 && @$months <= 11)

                        <span class="text-secondary" style="font-size: 10px;">&nbsp;Hace {{ $months }} meses.</span>

                    @else

                        @if (@$days >= 0 && @$days <= 31)
                            
                            <span class="text-secondary" style="font-size: 10px;">&nbsp;Hace {{ $days }} dias.</span>

                        @endif

                    @endif

                @endif
            </h6>
        </div>
    </a>
@else
    <a href="#pregunta{{$pregunta->id}}" class="d-block card-header py-3 border-left-info no-link pregunta" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
        <div class="form-row">
            <h6 class="text-dark">
                {{ $pregunta->pregunta }}?
                &nbsp;&nbsp;
                @if (@$years >= 1)

                    <span class="text-secondary" style="font-size: 10px;">&nbsp;Hace {{ $years }} años.</span>

                @else

                    @if (@$months >= 1 && @$months <= 11)

                        <span class="text-secondary" style="font-size: 10px;">&nbsp;Hace {{ $months }} meses.</span>

                    @else

                        @if (@$days >= 0 && @$days <= 31)
                            
                            <span class="text-secondary" style="font-size: 10px;">&nbsp;Hace {{ $days }} dias.</span>

                        @endif

                    @endif

                @endif
            </h6>
        </div>
    </a>
@endif