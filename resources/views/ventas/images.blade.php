@extends('layouts.app')

@section('title', 'Publicar')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vender.css') }}">
    <link rel="stylesheet" href="{{ asset('css/images.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">
            
            <div class="col-2 mt-4">

            </div>
            <div class="col-5 mt-4 align-self-center">
                <h1>Las fotos pueden hacer cosas increibles..!</h1>
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
        Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar subida";
        Dropzone.prototype.defaultOptions.dictUploadCanceled = "Subida cancelada";
        Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Esta seguro que desea cancelar la subida de este archivo?";

        //Subida dropzone
        Dropzone.options.myAwesomeDropzone = {
            //Se agrega un token de validacion necesario para Dropzone
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            acceptedFiles: "image/*",
            maxFilesize: 5,
            //maxFiles: 5,
            addRemoveLinks: true,
            autoProcessQueue: false,
            parallelUploads: 5,
            init: function () {

                var myDropzone = this;

                //El boton "subir archivos" desencadena el metodo ".processQueue()" que envia los archivos del Queue a la DB
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                //Emite un $refresh a livewire una vez se han terminado de subir los archivos del Queue a la DB
                this.on("complete", function (file) { 
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) { 
                        Livewire.emit('refreshImages');
                    } 
                }); 
            }
        };
        
        /*$(function () {
            $("#delete").click(function (e) {
                e.preventDefault();
                Livewire.emit('refreshImages');
            });
        });*/

    </script> 
@endpush