<div>
    {{--Row--}}
    <div class="row">

        <div class="col-2">

        </div>
        <div class="col-8">

            <div class="card">

                <div class="card-body mb-5">

                    <div class="form-group">
                        {{--Se agrega informacion al inicio del card sobre la seccion de imagenes--}}
                        @include('livewire.image.image-top-info')

                    </div>
                    
                    {{--Valida cuantas imagenes se han subido--}}
                    @if ($imageSection)
                        <div class="row">
                            {{--Agrega el formulario Dropzone valido--}}
                            @include('livewire.image.form-upload')

                        </div>
                    @else
                        <div class="row">
                            {{--Agrega un formulario Dropzone falso si ya se alcanzo el limite maximo de imagenes permitidas--}}
                            @include('livewire.image.form-finish')

                        </div>
                    @endif

                </div>

            </div>

            @if (@$imageCount >= 1)
                <a href="{{ route('productos.show', $producto) }}" class="btn btn-success float-right mt-2 mb-5">
                    <i class="far fa-check-circle mr-1"></i>
                    Publicar
                </a>
            @endif
            
            <form action="{{ route('ventas.deshabilitar') }}" method="post">
                @csrf
                
                <input type="hidden" value="{{ $producto }}" name="producto">
                <button type="submit" class="btn-link text-secondary float-left mt-3 mb-5 mr-3">
                    Cancelar publicacion
                </button>

            </form>

        </div>

    </div>
    {{--!Row--}}
</div>