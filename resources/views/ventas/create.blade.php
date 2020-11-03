@extends('layouts.app')

@section('title', 'Publicar')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vender.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">
            
            <div class="col-2 mt-4">

            </div>
            <div class="col-5 mt-4 align-self-center">
                <h1>Empecemos completando algunos datos</h1>
            </div>
            <div class="col-4 mt-4">
                <img src="{{ asset('images/zapato_venta.gif') }}" alt="">
            </div>

            <div class="col-12 mt-5">
                @livewire('vender-component')
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <script>

        $(function() {
            $('#name').on('blur',function () {
                if(!isValid($(this).val())) {
                    var blurEl = $(this); 
                    setTimeout(function() {
                        blurEl.focus()
                    }, 10);
                }
            });
        });

        function isValid(str) {
            if(str.length >= 7) {
                return true;
            } else {
                return false;
            }
        }
  
    </script> 
@endpush