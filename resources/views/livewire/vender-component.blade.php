<div>
    {{--Row--}}
    <div class="row">

        <div class="col-2">

        </div>
        <div class="col-8">
            <form role="form" action="" method="post">

                <!-- First Step -->
                    <div class="card shadow mb-4 h-100 w-100">

                        <div class="card-body">
            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="mt-3">
                                        <h5><b>Indica tu producto, marca y modelo</b></h5>
                                        <em style="color: rgba(128, 128, 128, 0.733);">
                                            Este será el título. Ten en cuenta que cuando tengas ventas, no podrás editarlo.
                                        </em>
                                    </label>
                                    <input
                                        class="form-control steps-input mt-5 mb-5"
                                        type="name" 
                                        wire:model="name"
                                        required="required" 
                                        placeholder="Ej: Celular Samsung Galaxy S9 64GB negro"
                                    >
                                </div>
                                <hr/>
                                @if (@$next1)
                                    <a class="btn btn-primary float-right mt-3 step2" wire:click="step2" href="#second-step">Siguiente</a>
                                @else
                                    <button class="btn btn-primary float-right mt-3" disabled>Siguiente</button>
                                @endif
                            </div>
                    
                        </div>
            
                    </div>

                @if (@1)
                    <!-- Second Step -->
                        <div id="second-step" class="card shadow mb-4 h-100 w-100">

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
                                            wire:model="categoria" 
                                            class="form-control steps-input mt-5 mb-5"
                                            required="required"
                                        >
                                            <option value="seleccione" selected>Seleccione una categoria</option>
                                            @foreach (@App\Categoria::all() as $item)
                                                <option value="{{ $item->id }}"> {{ $item->categoria }} </option>
                                            @endforeach
                                        </select>
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
                @endif

                @if (@1)
                    <!-- Third Step -->
                        <div id="third-step" class="card shadow mb-4 h-100 w-100">
                            
                            <div class="form-group">
                                <label class="mt-3">
                                    <h5 class="ml-3"><b>¿Cuál es la condicion de tu producto?</b></h5>
                                </label>
                                <hr>
                                <ul class="list-unstyled" style="margin-top: -16px;">
                                    <li class="condition-list">
                                        @if (@$condicion === "Nuevo")
                                            <div style="
                                            border-left: 4px solid rgba(83, 160, 248, 0.822);
                                            height: 70px;"
                                            ></div>
                                        @endif
                                        <label class="ml-3">
                                            <input 
                                            type="radio" 
                                            class="radio-steps" 
                                            name="condicion" 
                                            wire:model="condicion" 
                                            value="Nuevo"
                                            >
                                            Nuevo
                                        </label>
                                    </li>
                                    <li class="condition-list">
                                        @if (@$condicion === "Usado")
                                            <div style="
                                            border-left: 4px solid rgba(83, 160, 248, 0.822);
                                            height: 70px;"
                                            ></div>
                                        @endif
                                        <label class="ml-3">
                                            <input 
                                            type="radio" 
                                            class="radio-steps" 
                                            wire:model="condicion" 
                                            value="Usado" 
                                            name="condicion"
                                            >
                                            Usado
                                        </label>
                                    </li>
                                    <li class="condition-list">
                                        @if (@$condicion === "Reacondicionado")
                                            <div style="
                                            border-left: 4px solid rgba(83, 160, 248, 0.822);
                                            height: 70px;"
                                            ></div>
                                        @endif
                                        <label class="ml-3">
                                            <input 
                                            type="radio" 
                                            class="radio-steps" 
                                            wire:model="condicion" 
                                            value="Reacondicionado" 
                                            name="condicion"
                                            >
                                            Reacondicionado
                                            
                                            <a href="#" class="boton" data-toggle="tooltip" data-placement="right"
                                            title="Este producto contiene piezas que fueron reemplazadas y testeadas para que funcione y luzca como nuevo. Además, incluye los accesorios principales. Agrega en la descripción más detalles sobre el grado de reacondicionamiento.">?</a>
                                        </label>
                                    </li>
                                </ul>
                                @if (@$next3)
                                    <a class="btn btn-primary float-right mr-3 step2" href="#fourth-step">Siguiente</a>
                                @else
                                    <button class="btn btn-primary float-right mr-3" disabled>Siguiente</button>
                                @endif
                            </div>
                
                        </div>
                @endif

                @if (@1)
                    <!-- fourth Step -->
                        <div id="fourth-step" class="card shadow mb-4 h-100 w-100">

                            <div class="card-body">
                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mt-3">
                                            <h5 class="mb-5"><b>Completa la informacion de tu producto</b></h5>
                                            <em style="color: black;">
                                                <div class="info">
                                                    Para no perder exposición, asegúrate de que la primera foto tenga fondo blanco puro creado con un editor de imágenes. No agregues bordes, logos ni marcas de agua. Ver más consejos.
                                                </div>
                                            </em>
                                        </label>
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
                @endif
                
            </form>
        </div>

    </div>
    {{--!Row--}}
</div>