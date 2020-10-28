<div>

    @if (Auth::user() && empty(!$favoritos))
        @foreach ($favoritos as $item)
            
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            >
                {{ $item->id }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        @endforeach
    @else
        Parece que aun no hay nada por aqui!
    @endif
    
</div>
