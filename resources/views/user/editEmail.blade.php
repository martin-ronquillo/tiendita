@extends('layouts.app')

@section('title', 'Detalle de venta')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/edit_forms.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">

            <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                
                <p><b><h3>Modificar e-mail</h3></b></p>
                <br>
                
                {{--Comprador--}}
                <div class="card align-self-center w-100 mt-2">
                    <div class="card-body" style="background-color: rgb(255, 255, 255);">
                        
                        <form action="{{ route('users.update.email') }}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <label for="email" class="text-secondary">Ingresa tu nuevo e-mail</label>
                            <input type="text" name="email" class="form-control inputs-styles" id="email">
                            <br><br>
                            <label for="email" class="text-secondary">Repite tu e-mail</label>
                            <input type="text" name="reemail" class="form-control inputs-styles" id="email">
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