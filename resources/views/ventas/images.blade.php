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
                <h1>Agreguemos algunas imagenes a tu venta</h1>
            </div>
            <div class="col-4 mt-4">
                <img src="{{ asset('images/zapato_venta.gif') }}" alt="">
            </div>

            <div class="col-12 mt-2">
                @livewire('image-component', ['producto' => $producto])
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <script>
        //Traducciones Dropzone
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "Error interno";
        Dropzone.prototype.defaultOptions.dictRemoveFile = "Eliminar archivo";
        Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Solo puedes subir un maximo de 5 archivos";
        Dropzone.prototype.defaultOptions.dictInvalidFileType = "No puedes subir archivos de este tipo.";

        //Subida dropzone
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            acceptedFiles: "image/*",
            maxFilesize: 5,
            maxFiles: 5,
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function () {

                var myDropzone = this;

                // Update selector to match your button
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });
            }
        };
        
    </script> 
@endpush