@extends('layouts.app')

@section('title', 'Detalle de venta')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/edit_forms.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                
                <p><b><h3>Modificar nombre</h3></b></p>
                <br>
                
                {{--Comprador--}}
                <div class="card align-self-center w-100 mt-2">
                    <div class="card-body" style="background-color: rgb(255, 255, 255);">
                        
                        <form action="{{ route('users.update.name') }}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <label for="name" class="text-secondary">Nombre</label>
                            <input type="text" name="nombre" class="form-control inputs-styles" id="name" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                            @error('nombre') 
                                <span class="error text-danger">{{ $message }}</span> 
                            @enderror
                            <br><br>

                            <label for="apellido_pater" class="text-secondary">Apellido paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control inputs-styles" id="apellido_pater" value="{{ $user->apellido_pater }}" placeholder="{{ $user->apellido_pater }}">
                            @error('apellido_pater') 
                                <span class="error text-danger">{{ $message }}</span> 
                            @enderror
                            <br><br>

                            <label for="apellido_mater" class="text-secondary">Apellido materno</label>
                            <input type="text" name="apellido_materno" class="form-control inputs-styles" id="apellido_mater" value="{{ $user->apellido_mater }}" placeholder="{{ $user->apellido_mater }}">
                            @error('apellido_mater') 
                                <span class="error text-danger">{{ $message }}</span> 
                            @enderror
                            <br><br>

                            <button type="submit" class="btn btn-lg btn-primary text-light mr-5">
                                Guardar
                            </button>

                            <a href="{{ route('users.datos', Auth::user()->id) }}">
                                Cancelar
                            </a>

                        </form>

                    </div>
                </div>
            
            </div>

        </div>

    </div>

@endsection