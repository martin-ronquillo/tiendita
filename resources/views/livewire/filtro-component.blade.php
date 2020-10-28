<div>
    @php
        $i = 0;

        foreach($results as $key){
            $i += 1;
        }
    @endphp

{{--Si los resultados son menores a 1, la columna de filtros no se mostrara--}}
    @if ($i >= 1)

        <div class="row">
            {{--Filtros de busqueda--}}
                <div class="col-3 mt-3 filtros">
                    
                    @include('livewire.search.filtros')

                </div>

            {{--Resultados de busqueda--}}
                <div class="row col-sm-12 col-md-12 col-lg-9 mt-3">

                    <ul class="list-group w-100">
                        
                        @include('livewire.search.resultList')

                    </ul>

                </div>

        </div>

    @else

        {{--Resultados de busqueda--}}
            <div class="row col-sm-12 col-md-12 col-lg-12 mt-5">

                <ul class="list-group w-100">
                    
                    @include('livewire.search.resultList')

                </ul>

            </div>

    @endif
</div>
