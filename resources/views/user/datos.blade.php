@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ventas_show.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12">
            <h3 class="mt-5 ml-3"><b>Mis datos</b></h3>
            <br>
            <br>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12 ml-3">
            {{--Contactos por responder Y Publicaciones--}}
                <div class="row">
                    {{--Datos de la cuenta--}}
                    <div class="col-11 mb-4">

                        <h5 class="mt-2"><b>Datos de cuenta</b></h5>

                        <div class="card no-border mt-4">

                            <a href="{{ route('users.email', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="text-dark" style="font-size: 17px;">E-mail</span> 
                                        </div>
                                        <div class="col-4">
                                            <span class="text-secondary">{{ $user->email }}</span> 
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-info" style="font-size: 19px;"><b>&nbsp; ></b></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('users.clave', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="text-dark" style="font-size: 17px;">Clave</span> 
                                        </div>
                                        <div class="col-4">
                                            <span class="text-secondary">********</span> 
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-info" style="font-size: 19px;"><b>&nbsp; ></b></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>
    
                        </div>

                    </div>

                    <div class="col-1">

                    </div>

                    {{--Datos personales--}}
                    <div class="col-11 mb-4">

                        <h5 class="mt-2"><b>Datos personales</b></h5>

                        <div class="card no-border mt-4">

                            <a href="{{ route('users.name', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="text-dark" style="font-size: 17px;">Nombre y apellido</span> 
                                        </div>
                                        <div class="col-4">
                                            <span class="text-secondary">{{ $user->name }} {{ $user->apellido_pater }} {{ $user->apellido_mater }}</span> 
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-info" style="font-size: 19px;"><b>&nbsp; ></b></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="{{ route('users.cedula', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="text-dark" style="font-size: 17px;">Documento</span> 
                                        </div>
                                        <div class="col-4">
                                            <span class="text-secondary">Cedula {{ $user->cedula }}</span> 
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-info" style="font-size: 19px;"><b>&nbsp; ></b></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('users.telefono', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="text-dark" style="font-size: 17px;">Telefono</span> 
                                        </div>
                                        <div class="col-4">
                                            <span class="text-secondary">{{ $user->tlf }}</span> 
                                        </div>
                                        <div class="col-4 text-right">
                                            <span class="text-info" style="font-size: 19px;"><b>&nbsp; ></b></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>

                    </div>

                    <div class="col-1">

                    </div>

                    {{--Datos personales--}}
                    <div class="col-11 mb-4">

                        <h5 class="mt-2"><b>Domicilio</b></h5>

                        <div class="card no-border mt-4">

                            <a href="{{ route('users.direccion', Auth::user()->id) }}" class="no-link-card">
                                <div class="card-footer" style="background-color: transparent;">
                                    <div class="row">
                                        <div class="col-10">
                                            <span class="text-secondary">{{ $user->direc }}</span> 
                                        </div>
                                        <div class="col-2 text-right">
                                            <span class="text-info" style="font-size: 19px;"><b>&nbsp; ></b></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-1">

                    </div>

                </div>
        
        </div>        

    </div>
</div>
@endsection