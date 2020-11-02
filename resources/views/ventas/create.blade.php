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

        Dropzone.options.fileUpload = {
            url: 'http://tiendita.test/vender',
            addRemoveLinks: true,
            accept: function(file) {
                let fileReader = new FileReader();

                fileReader.readAsDataURL(file);
                fileReader.onloadend = function() {

                    let content = fileReader.result;
                    $('#file').val(content);
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.classList.add("dz-complete");
            }
        }

        //Traducciones Dropzone
        /*Dropzone.prototype.defaultOptions.dictDefaultMessage = "";
        Dropzone.prototype.defaultOptions.dictFallbackMessage = "Tu navegador no soporta el arraste de archivos.";
        Dropzone.prototype.defaultOptions.dictFallbackText = "Por favor, da clic en el recuadro y selecciona tus archivos como en los viejos tiempos.";
        Dropzone.prototype.defaultOptions.dictInvalidFileType = "No puedes subir archivos de este tipo.";
        Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar subida";
        Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Estas seguro que deseas cancelar esta subida?";
        Dropzone.prototype.defaultOptions.dictRemoveFile = "Eliminar archivo";
        Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "No puedes subir mas archivos.";

        Dropzone.options.myDropzone= {
            url: 'http://tiendita.test/vender',   //Url a la que se enviara el formulario
            autoProcessQueue: true, //Especifica que las imagenes se suban inmediatamente cuando se las selecciona, usar "false" para evitar
            uploadMultiple: true,
            parallelUploads: 5,
            paramName: "file",
            maxFiles: 5,
            maxFilesize: 5,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                /*document.getElementById("submit-all").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("name", jQuery("#name").val());
                    formData.append("categoria", jQuery("#categoria").val());
                    formData.append("condicion", jQuery("#condicion").val());
                    formData.append("cantidad", jQuery("#cantidad").val());
                });
            }
        }*/
  
    </script> 
@endpush