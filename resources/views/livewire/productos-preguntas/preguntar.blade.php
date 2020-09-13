<div class="row">

    @if (auth()->check())
        <div class="col-9">
            <textarea 
            wire:model="pregunta"
            placeholder="Escribe una pregunta..." 
            class="form-control"
            style="height: 48px;"
            >
            </textarea>
        </div>

        <div class="col-3">
            <button 
            wire:click="store"
            class="btn btn-primary btn-lg btn-block"
            style="margin-left: -10px"
            >
                Preguntar
            </button>
        </div>
    @else
        <div class="col-10">
            <textarea 
            placeholder="Escribe una pregunta..." 
            class="form-control"
            style="height: 48px;"
            >
            </textarea>
        </div>

        <div class="col-2">
            <a 
            href="{{ url('/login?redirect_to='.url()->current()) }}"
            class="btn btn-primary btn-lg text-light"
            style="margin-left: -10px" 
            >
                Preguntar
            </a>
        </div>
    @endif

    <div class="col-12">
        
        @error('pregunta')
        <span class="text-danger">{{ $message }}</span>
        <br>
        @enderror
        <em class="text-secondary">
            El vendedor respondera a tu pregunta cuando se encuentre disponible
        </em>
    </div>

</div>