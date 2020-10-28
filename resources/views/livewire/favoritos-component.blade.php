<div>
    @if (@$favoritos)
        @if (@Auth::user()->id === @$favoritos->first()->user_id 
            && @$favoritos->first()->producto_id === @$identificador)
            <button 
            class="btn-icon ml-auto"
            wire:click="quitar({{ $favoritos->first()->id }})"
            >
                <i class="fas fa-heart"></i>
            </button>
        @else
            <button 
            class="btn-icon ml-auto"
            wire:click="agregar"
            >
                <i class="far fa-heart"></i>
            </button>
        @endif
    @else
        <a 
        href="{{ url('/login?redirect_to='.url()->current()) }}"
        class="btn-icon ml-auto text-primary"
        >
            <i class="far fa-heart"></i>
        </a>
    @endif
</div>
