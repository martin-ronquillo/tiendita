<div id="fourth-step" class="card shadow mb-4 h-100 w-100" style="{{$step4}}">

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
                <textarea 
                name="caracteristicas" 
                class="form-control" 
                wire:model="caracteristicas" 
                cols="30" 
                rows="10" 
                placeholder="Ingresa las caracteristicas del producto"
                >
                </textarea>
            </div>

            <div class="form-group mt-4">
                <label for=""><b>Descripcion:</b></label>
                <textarea 
                name="descripcion" 
                class="form-control" 
                wire:model="descripcion" 
                cols="30" 
                rows="10" 
                placeholder="Ingresa la descripcion del producto"
                >
                </textarea>
            </div>

            <div class="row">

                <div class="col-6">
                    <label for="cantidad" class="mt-5" style="color: rgba(128, 128, 128, 0.733);">Cantidad</label>
                    <br>
                    <input type="number" name="cantidad" class="steps-input" value="1">
                </div>
                <div class="col-6">
                    <label for="precio" class="mt-5" style="color: rgba(128, 128, 128, 0.733);">Precio</label>
                    <br>
                    <input type="number" step="0.01" name="cantidad" class="steps-input" value="1">
                </div>
            </div>
            
            <hr/>
            
        </div>
        
        @if (@$next4)
            <a class="btn btn-primary float-right mr-4 step2" href="#fourth-step">Siguiente</a>
        @else
            <button class="btn btn-primary float-right mr-4" disabled>Siguiente</button>
        @endif

    </div>

</div>




{{--
<div id="fourth-step" class="card shadow mb-4 h-100 w-100">

    <div class="card-body">

        <div class="col-md-12">
            <div class="form-group">
                <label class="mt-3">
                    <h5 class="mb-5"><b>Completa la informacion de tu producto</b></h5>
                    <em style="color: black;">
                        <div class="info">
                            Para no perder exposición, asegúrate de que la primera foto tenga fondo blanco puro creado con un editor de imágenes. No agregues bordes, logos ni marcas de agua.
                        </div>
                    </em>
                </label>
            </div>
            
            <div class="dropzone dropzone-file-area" id="fileUpload">
                <div class="dz-default dz-message">
                    <h3 class="sbold">Arrasta archivos aqui para cargar</h3>
                    <span>Puedes hacer clic para abrir tus archivos</span>
                </div>
            </div>

            <label for="cantidad" class="mt-5" style="color: rgba(128, 128, 128, 0.733);">Cantidad</label>
            <br>
            <input type="number" name="cantidad" class="steps-input" value="1">

            <hr/>
            
        </div>

    </div>

</div>


<button type="submit" id="submit-all" class="btn btn-primary float-right mt-2 mb-5" style="{{$step4}}">Siguiente</button>
--}}