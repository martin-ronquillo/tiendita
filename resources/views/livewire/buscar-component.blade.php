<div>
    <input 
        wire:model="buscar"
        type="text"
        autocomplete="off"
        name="search"
        id="search"
        placeholder="Buscar productos, marcas y más..."
    />
    
    <span class="icon">
        <button type="submit">
            <i class="fas fa-search"></i>
        </button>
    </span>

    @if (@$items)
        @if (@$buscar && strlen(@$buscar)>=3)
            <ul class="auto-complete">
                @foreach($items as $item)
                <br>
                    <li>
                        <button type="submit" value="{{ $item->name }}" class="dropdown-item" name="search">
                            {{ $item->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
    
</div>
