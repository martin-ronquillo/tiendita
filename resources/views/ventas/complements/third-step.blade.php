<div id="third-step" class="card shadow mb-4 h-100 w-100" style="{{@$step3}}">
                            
    <div class="form-group">
        <label class="mt-3">
            <h5 class="ml-3"><b>¿Cuál es la condicion de tu producto?</b></h5>
        </label>
        <hr>
        <ul class="list-unstyled" style="margin-top: -16px;">
            <li class="condition-list">
                @if (@$venta->productos->estado === "Nuevo")
                    <label class="ml-3">
                        <input 
                        type="radio" 
                        name="condicion" 
                        id="condicion"
                        wire:model="condicion" 
                        value="Nuevo"
                        checked
                        >
                        Nuevo
                    </label>
                @else
                    <label class="ml-3">
                        <input 
                        type="radio" 
                        name="condicion" 
                        id="condicion"
                        wire:model="condicion" 
                        value="Nuevo"
                        >
                        Nuevo
                    </label>
                @endif
            </li>
            <li class="condition-list">
                @if (@$venta->productos->estado === "Usado")
                    <label class="ml-3">
                        <input 
                        type="radio" 
                        wire:model="condicion" 
                        value="Usado" 
                        name="condicion"
                        id="condicion"
                        checked
                        >
                        Usado
                    </label>
                @else
                    <label class="ml-3">
                        <input 
                        type="radio" 
                        wire:model="condicion" 
                        value="Usado" 
                        name="condicion"
                        id="condicion"
                        >
                        Usado
                    </label>
                @endif
            </li>
            <li class="condition-list">
                @if (@$venta->productos->estado === "Reacondicionado")
                    <label class="ml-3">
                        <input 
                        type="radio" 
                        wire:model="condicion" 
                        value="Reacondicionado" 
                        name="condicion"
                        id="condicion"
                        checked
                        >
                        Reacondicionado
                        
                        <a href="#third-step" class="boton" data-toggle="tooltip" data-placement="right"
                        title="Este producto contiene piezas que fueron reemplazadas y testeadas para que funcione y luzca como nuevo. Además, incluye los accesorios principales. Agrega en la descripción más detalles sobre el grado de reacondicionamiento.">?</a>
                    </label>
                @else
                    <label class="ml-3">
                        <input 
                        type="radio" 
                        wire:model="condicion" 
                        value="Reacondicionado" 
                        name="condicion"
                        id="condicion"
                        >
                        Reacondicionado
                        
                        <a href="#third-step" class="boton" data-toggle="tooltip" data-placement="right"
                        title="Este producto contiene piezas que fueron reemplazadas y testeadas para que funcione y luzca como nuevo. Además, incluye los accesorios principales. Agrega en la descripción más detalles sobre el grado de reacondicionamiento.">?</a>
                    </label>
                @endif
            </li>
        </ul>
        {{--
        @if (@$next3)
            <a class="btn btn-primary float-right mr-4 step2" href="#fourth-step">Siguiente</a>
        @else
            <button class="btn btn-primary float-right mr-4" disabled>Siguiente</button>
        @endif--}}
    </div>

</div>