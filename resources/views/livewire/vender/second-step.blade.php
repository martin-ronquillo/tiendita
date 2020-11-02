<div id="second-step" class="card shadow mb-4 h-100 w-100" style="{{$step2}}">

    <div class="card-body">

        <div class="col-md-12">
            <div class="form-group">
                <label class="mt-3">
                    <h5><b>Elige una categoria para tu producto</b></h5>
                    <em style="color: rgba(128, 128, 128, 0.733);">
                        Es muy importante que la categoría sea la apropiada para 
                        que tus compradores encuentren tu producto. Si no lo es, 
                        podríamos pedirte que vuelvas a publicar.
                    </em>
                </label>
                <hr>
                <select 
                    name="categoria" 
                    id="categoria"
                    wire:model="categoria" 
                    class="form-control steps-input mt-5 mb-5"
                    required="required"
                >
                    <option value="seleccione" selected>Seleccione una categoria</option>
                    @foreach (@App\Categoria::all() as $item)
                        <option value="{{ $item->id }}"> {{ $item->categoria }} </option>
                    @endforeach
                </select>
                @error('categoria') 
                    <span class="error text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <hr/>
            @if (@$next2)
                <a class="btn btn-primary float-right mt-3 step2" href="#third-step">Siguiente</a>
            @else
                <button class="btn btn-primary float-right mt-3" disabled>Siguiente</button>
            @endif
        </div>

    </div>

</div>