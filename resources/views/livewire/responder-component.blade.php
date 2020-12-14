
@php
    $empty = 1;
@endphp
<div>
    {{--Recorre el array de ventas con preguntas sin responder, el array viene desde el componente--}}
    @foreach ($preguntaVentas as $item)
        {{--Recorre las ventas--}}
        @foreach ($ventas as $venta)
            {{--Si el "id" contenido en el array es igual al "id" de la venta, se escribe--}}
            @if ($item == $venta->id)

                <div class="mt-5">
                    <div class="accordion" id="accordionExample">

                        <div class="card card-respuestas no-border">
                            
                            @include('livewire.responder.card-header')

                            @foreach ($venta->productos->preguntas as $pregunta)

                                @if (!$pregunta->respuestas)
                                
                                    @include('livewire.responder.preguntas')
            
                                    @include('livewire.responder.card-body')
                                    
                                    @php
                                        $empty++;
                                    @endphp

                                @endif

                            @endforeach

                            @php
                                $empty = 1;
                            @endphp
                            
                        </div>

                    </div>
                </div>

            @endif

        @endforeach

    @endforeach

</div>
