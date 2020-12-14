@php
    //Completa tu cuenta
    $user_profile = 99.9;
        if ($user->apellido_mater === Null) {
            $user_profile = $user_profile - 11.1;
        }
        if ($user->direc === Null) {
            $user_profile = $user_profile - 11.1;
        }
        if ($user->tlf === Null) {
            $user_profile = $user_profile - 11.1;
        }
        if ($user->picture === Null) {
            $user_profile = $user_profile - 11.1;
        }
    //Progresa como vendedor
    $user_ventas = 0;
        if ($user->ventas->count() >= 1) {
            $user_ventas = $user_ventas + 25;
        }
        if ($user->ventas->count() >= 10) {
            $user_ventas = $user_ventas + 25;
        }
        if ($user->ventas->count() >= 30) {
            $user_ventas = $user_ventas + 25;
        }
        if ($user->ventas->count() >= 70) {
            $user_ventas = $user_ventas + 25;
        }
@endphp

@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/respuestas.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12 mt-4">
            <span class="text-secondary" style="font-size: 15px;">
                Ventas
            </span> 
            <span style="font-size: 15px;"> 
                > Preguntas
            </span>
            <br>
            <br>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="card card-respuestas no-border">
                
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-12 text-primary">
                            <br>
                            <b class="text-dark">Completa tu cuenta</b>
                        </div>
                        <div class="col-11 text-right text-primary">
                            <div class="progress mt-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ round($user_profile) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> 
                            <br>
                        </div>
                        <div class="col-1 text-right mt-1">
                            <span class="text-secondary">{{ round($user_profile) }}%</span>
                        </div>
                        <div class="col-12">
                            <br>
                            <i class="fas fa-check text-success mr-3"></i><span class="text-dark">Tienes cuenta en MercadoLibre.</span>
                            <br>
                            <br>
                            <i class="fas fa-check text-success mr-3"></i><span class="text-dark">Tienes la App de MercadoLibre.</span>
                        </div>
                    </div>
                </div>

                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-12 text-primary">
                            <br>
                            <b class="text-dark">Progresa como vendedor</b>
                        </div>
                        <div class="col-11 text-right text-primary">
                            <div class="progress mt-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ round($user_profile) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> 
                            <br>
                        </div>
                        <div class="col-1 text-right mt-1">
                            <span class="text-secondary">{{ round($user_profile) }}%</span>
                        </div>
                        <div class="col-12">
                            <br>
                            <i class="fas fa-check text-success mr-3"></i><span class="text-dark">Tienes cuenta en MercadoLibre.</span>
                            <br>
                            <br>
                            <i class="fas fa-check text-success mr-3"></i><span class="text-dark">Tienes la App de MercadoLibre.</span>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>        

    </div>
</div>
@endsection