@extends('layouts.app')

@section('title', 'Detalle de venta')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/edit_forms.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                
                <p><b><h3>Cambiar clave</h3></b></p>
                <br>
                
                {{--Comprador--}}
                <div class="card align-self-center w-100 mt-2">
                    <div class="card-body" style="background-color: rgb(255, 255, 255);">

                        <div class="row">

                            <div class="col-5">
                                <form action="{{ route('users.update.clave') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    
                                    <label for="clave" class="text-secondary">Nueva clave</label>
                                    <input type="text" name="clave" class="form-control inputs-styles" id="clave">
                                    @error('clave') 
                                        <span class="error text-danger">{{ $message }}</span> 
                                    @enderror
                                    <br><br>
        
                                    <label for="clave" class="text-secondary">Confirma la nueva clave</label>
                                    <input type="text" name="clave_confirmation" class="form-control inputs-styles" id="clave">
                                    @error('clave_confirmation') 
                                        <span class="error text-danger">{{ $message }}</span> 
                                    @enderror
                                    <br><br>
        
                                    <button type="submit" class="btn btn-lg btn-primary text-light mr-5">
                                        Cambiar clave
                                    </button>
        
                                    <a href="{{ route('users.datos', Auth::user()->id) }}">
                                        Cancelar
                                    </a>
        
                                </form>
                            </div>

                            <div class="col-1">

                            </div>

                            <div class="col-6">
                                <b>Cómo debe ser tu clave</b>
                                <p class="text-secondary">Debe tener entre 6 y 20 caracteres.</p>
                                <p class="text-secondary">No incluyas tu nombre, apellido o e-mail, ni caracteres idénticos consecutivos.</p>
                            </div>

                        </div>

                    </div>
                </div>
            
            </div>

        </div>

    </div>

@endsection