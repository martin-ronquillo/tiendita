<div>
    <div class="col-12 text-justify mt-4 mb-4">
        <p><b><h4>Preguntas y respuestas</h4></b></p>
        
        @if (@$producto->ventas->first()->users->id !== @Auth::user()->id)
            @include('livewire.productos-preguntas.preguntar')
        @endif
    </div>
    
    <div class="col-12 text-justify mt-4 mb-4">
        @include('livewire.productos-preguntas.preguntas')
    </div>
</div>