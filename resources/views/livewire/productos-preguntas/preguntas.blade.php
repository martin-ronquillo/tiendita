@if (@$preguntas->count() >= 1)

    <p class="mt-5"><h5>Ultimas preguntas</h5></p>

    @foreach (@$preguntas as $item)

        <div class="p-y-r mb-4">
            
            @if (substr($item->pregunta, -1) == '?')
            
                <i class="far fa-comment-dots mr-2"></i>{{ @$item->pregunta }}
                
            @else
                
                <i class="far fa-comment-dots mr-2"></i>{{ @$item->pregunta }}?

            @endif

            <a href="#" class="ml-2">
                <i class="text-primary report">Denunciar</i>
            </a>

            @if (@$item->respuestas)
                <p>
                    <i class="fas fa-comment-dots mr-2"></i>
                    <em class="text-secondary">{{ @$item->respuestas->respuesta }}.
                        &nbsp;<i style="font-size: 11px">{{ @$item->respuestas->created_at }}</i>
                    </em>
                    <a href="#">
                        <i class="text-primary report">Denunciar</i>
                    </a>
                </p>
            @endif

        </div>

    @endforeach
@else

    <h5>Nadie hizo preguntas todavía. <b>¡Sé el primero!</b></h5>

@endif