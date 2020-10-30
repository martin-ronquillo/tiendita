<div>

    <div class="row">
        
        <div class="col-11">
            <input 
                wire:model="buscar"
                type="text"
                autocomplete="off"
                name="search"
                id="search"
                placeholder="Buscar productos, marcas y más..."
            />
        </div>
        <div class="col-1">
            <span class="icon">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </span>
        </div>
        <div class="col-12">
            @if (@$items)
                @if (@$buscar && strlen(@$buscar)>=3)
                    <ul class="auto-complete">
                        @foreach($items as $item)
                            <br>
                            <li>
                                <button 
                                type="submit" 
                                value="{{ $item->name }}" 
                                class="dropdown-item" 
                                name="search"
                                >
                                    {{ $item->name }}
                                </button>
                            </li>
                            @if ($loop->iteration >= 3)
                                @break
                            @endif
                        @endforeach
                    </ul>
                @endif
            @endif
        </div>

    </div>
    
</div>
