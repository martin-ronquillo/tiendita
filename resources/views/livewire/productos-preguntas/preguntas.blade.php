<p class="mt-5"><h5>Ultimas preguntas</h5></p>
    
@if (@$preguntas)
    @foreach (@$preguntas as $item)

        <div class="p-y-r mb-4">
            
            <i class="far fa-comment-dots mr-2"></i>{{ @$item->pregunta }}
            {{--
            @if (@!$item->respuestas)
                <button 
                class="ml-2 no-btn reply" 
                onClick="document.getElementById('oculto').style.display='inline'"
                title="Responder a esta pregunta">
                    <i class="fas fa-reply text-primary"></i>
                </button>
            @endif
            --}}
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
            {{--@else
                @if (@$producto->ventas->first()->users->id === @Auth::user()->id)
                    @include('livewire.productos-preguntas.responder')
                @endif--}}
            @endif

        </div>

    @endforeach
@endif