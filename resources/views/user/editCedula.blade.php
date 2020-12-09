@extends('layouts.app')

@section('title', 'Detalle de venta')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/edit_forms.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                
                <p><b><h3>Modificar cedula</h3></b></p>
                <br>
                
                {{--Comprador--}}
                <div class="card align-self-center w-100 mt-2">
                    <div class="card-body" style="background-color: rgb(255, 255, 255);">
                        
                        <form action="{{ route('users.update.cedula') }}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <label for="cedula" class="text-secondary">Ingrese su numero de cedula</label>
                            <input type="text" name="cedula" class="form-control inputs-styles" id="cedula" value="{{ $user->cedula }}" placeholder="{{ $user->cedula }}">
                            @error('cedula') 
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