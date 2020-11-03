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