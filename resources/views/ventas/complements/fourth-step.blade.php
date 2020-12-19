<div id="fourth-step" class="card shadow mb-4 h-100 w-100" style="{{@$step4}}">

    <div class="card-body">

        <div class="col-md-12">
            <div class="form-group">
                <label class="mt-3">
                    <h5 class="mb-5"><b>Completa la informacion de tu producto</b></h5>
                    <em style="color: black;">
                        <div class="info">
                            Para no perder exposición, asegúrate de ingresar las caracteristicas y una descripcion acorde con el producto, 
                            de esta forma se puede transmitir facilmente lo que estas vendiendo a tus clientes.
                        </div>
                    </em>
                </label>
            </div>
            
            <div class="form-group mt-4">
                <label for=""><b>Caracteristicas:</b></label>
                <br>
                @error('caracteristicas') 
                    <span class="error text-danger">{{ $message }}</span> 
                @enderror
                <textarea 
                name="caracteristicas" 
                class="form-control" 
                wire:model="caracteristicas" 
                cols="30" 
                rows="10" 
                placeholder="Ingresa las caracteristicas del producto"
                >
                {{ $venta->productos->caracteristicas }}
                </textarea>
            </div>
            <br>
            <div class="form-group mt-4">
                <label for=""><b>Descripcion:</b></label>
                <br>
                @error('descripcion') 
                    <span class="error text-danger">{{ $message }}</span> 
                @enderror
                <textarea 
                name="descripcion" 
                class="form-control" 
                wire:model="descripcion" 
                cols="30" 
                rows="10" 
                placeholder="Ingresa la descripcion del producto"
                >
                {{ $venta->productos->descripcion }}
                </textarea>
            </div>

            <div class="row">

                <div class="col-6">
                    <label for="cantidad" class="mt-5" style="color: rgba(128, 128, 128, 0.733);">Cantidad</label>
                    <br>
                    <input type="number" name="stock" wire:model="stock" class="steps-input" value="{{ $venta->productos->stock }}">
                    @error('cantidad') 
                        <span class="error text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="col-6">
                    <label for="precio" class="mt-5" style="color: rgba(128, 128, 128, 0.733);">Precio</label>
                    <br>
                    <input type="number" step="0.01" name="precio" wire:model="precio" class="steps-input" value="{{ $venta->productos->precio }}">
                    @error('precio') 
                        <span class="error text-danger">{{ $message }}</span> 
                    @enderror
                </div>
            </div>
            
            {{--<hr/>--}}
            
        </div>
        {{--
        @if (@$next4)
            <a class="btn btn-primary float-right mr-4 step2" href="#fifth-step">Siguiente</a>
        @else
            <button class="btn btn-primary float-right mr-4" disabled>Siguiente</button>
        @endif--}}

    </div>

</div>