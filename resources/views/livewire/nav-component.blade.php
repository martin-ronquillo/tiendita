@php
    $i = 0;

    foreach ($favoritos as $key) {
        $i += 1;
    }
@endphp

{{--<div wire:poll.0.1s> Esto refresca el componente cada 0.1s--}}
<div>

    <b class="ml-3">Favoritos</b>
    <div class="divider mt-2 mb-2"></div>
    @if (Auth::user() && $i > 0)
        @foreach ($favoritos as $item)
            
            <a class="dropdown-item" href="{{ route('logout') }}"
                style="width: 410px;"
            >
                <div class="row">

                    @if ($item->productos->images->first())
                    
                        <div class="col-3 center img-content">
                            <img class="ml-3" src="{{ $item->productos->images->first()->url }}" alt="{{ $item->productos->name }}">
                        </div>

                    @else

                        <div class="col-3 center img-content">
                            <img class="ml-3" src="{{ asset('images/no-image.png') }}" alt="{{ $item->productos->name }}">
                        </div>

                    @endif

                    <div class="col-9">
                        @if (strlen($item->productos->name) <= 44)
                            {{ $item->productos->name }}
                        @else
                            @php
                                echo substr_replace($item->productos->name, '...', 40);
                            @endphp
                        @endif
                        <br>
                        <h5>U$S {{ $item->productos->precio }}</h5>
                    </div>
                </div>
            </a>

            @if ($loop->iteration > 0)
                <hr/>            
            @endif

            @if ($loop->iteration >= 4)
                <a href="" class="link text-blue" style="color: rgba(0, 81, 255, 0.89);">
                    <b class="ml-3 mb-2 center">Ver todos los favoritos</b>
                </a>

                @break
            @endif

        @endforeach
    @else
        <p class="dropdown-item text-center" style="width: 410px;">
            Parece que aun no hay nada por aqui!
        </p>
    @endif
    
</div>
