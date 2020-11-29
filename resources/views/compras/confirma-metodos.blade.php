@php
    if (@$cantidad == 'mas') {
        $height = "400px;";
    }else {
        $height = "350px;";
    }
@endphp

@extends('layouts.app')

@section('title', 'Confirmar compra')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-12 mb-5">

            </div>

            <div class="card col-8 mt-5 align-self-center text-center" style="{{$height}}">
                <div class="card-body">
                    <h4 class="card-title text-bold mt-5"><b>Acuerdas el envío y el pago con el vendedor</b></h4>
                    <p class="card-text text-center text-secondary mt-4">
                        Luego de confirmar tu compra, tendras que contactarlo para <br>
                         acordar el pago y la entrega del producto.
                    </p>
                    <form action="{{ route('compras.revisa-confirma') }}" method="GET">

                        <input type="hidden" name="producto" value="{{ $producto }}">

                        @if (@$cantidad == 'mas')
                            <br>
                            <em class="text-secondary">Por favor, confirma la cantidad deseada de unidades a adquirir 
                                ({{ App\Producto::where('id', $producto)->first()->stock }}) disponibles
                            </em>
                            <br>
                            <br>
                            <input type="number" step="0.01" name="cantidad" class="steps-input" value="1">
                            <br>
                        @else
                            <input type="hidden" name="cantidad" value="{{ $cantidad }}">
                        @endif
                        <br>   
                        <button type="submit" class="btn btn-primary text-light mt-4">Ok, entendido</button>

                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
@push('scripts')
    <script>

        
  
    </script> 
@endpush