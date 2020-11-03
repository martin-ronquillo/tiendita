<div>
    {{--Row--}}
    <div class="row">

        <div class="col-2">

        </div>
        <div class="col-8">

            <div class="card">

                <div class="card-body mb-5">

                    <div class="form-group">
                        <label class="mt-3">
                            <h5 class="mb-5"><b>Completa la informacion de tu producto</b></h5>
                            <em style="color: black;">
                                <div class="info">
                                    Para no perder exposición, asegúrate de que la primera foto tenga fondo blanco puro,
                                     creado con un editor de imágenes. No agregues bordes, logos ni marcas de agua.
                                </div>
                            </em>
                        </label>
                    </div>
                    
                    @if ($imageSection)
                        <div class="row">
                            
                            <div class="col-12">
                                <form 
                                name="imgform" 
                                id="my-awesome-dropzone" 
                                action="{{ route('ventas.storeImages') }}" 
                                enctype="multipart/form-data" 
                                method="POST"
                                class="dropzone"
                                >
                    
                                    <div class="dz-default dz-message">
                                        <h3 class="sbold">Arrasta archivos aqui para cargar</h3>
                                        <span>Puedes hacer clic para abrir tus archivos</span>
                                    </div>
                    
                                    <input type="hidden" name="producto" value="{{ $producto }}">
                                    
                                </form>
                            </div>
                            
                            <div class="col-9 mt-2">
                                <em style="color: black;">
                                    <div class="danger">
                                        Ten en cuenta que una vez subidas tus fotos, estas no se podran editar.
                                    </div>
                                </em>
                            </div>

                            <div class="col-3 mt-2 d-flex">
                                <button type="submit" id="button" class="btn btn-primary ml-auto">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    Subir archivos
                                </button>
                            </div>

                        </div>
                    @else
                    <div class="row">

                        <div class="col-12">
                            <div class="dropzone dropzone-file-area" id="fileUpload">
                                <div class="dz-default dz-message">
                                    <h3 class="sbold">Arrasta archivos aqui para cargar</h3>
                                    <span>Puedes hacer clic para abrir tus archivos</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-9">

                        </div>

                        <div class="col-3 mt-2 d-flex">
                            <button type="submit" id="button" class="btn btn-primary ml-auto" disabled>
                                <i class="fas fa-cloud-upload-alt"></i>
                                Subir archivos
                            </button>
                        </div>

                    </div>
                    @endif

                </div>

            </div>

        </div>

    </div>
    {{--!Row--}}
</div>