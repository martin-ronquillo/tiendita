@extends('layouts.app')

@section('title', 'Mis compras')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
@endsection

@section('content')

    <div class="container" style="margin-top: 100px;">

        <div class="justify-content-center">

            <ul 
            class="nav nav-tabs text-center" 
            id="myTab" 
            role="tablist" 
            style="
            background-color: white; 
            width: 800px; 
            margin-left: auto; 
            margin-right: auto;
            ">
                <li class="nav-item" style="width: 50%;">
                    <a 
                    class="nav-link active" 
                    id="home-tab" 
                    data-toggle="tab" 
                    href="#home" 
                    role="tab" 
                    aria-controls="home" 
                    aria-selected="true"
                    >
                        Sobre la compra
                    </a>
                </li>
                <li class="nav-item" style="width: 50%;">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        Sobre el vendedor
                    </a>
                </li>
            </ul>

            <form action="" method="post">

                <div class="tab-content" id="myTabContent" style="width: 800px; margin-left: auto; margin-right: auto;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body">
                                <h3>¿Recibiste el articulo que esperabas?</h3>
                                <br>
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="radio" name="confirmacion" id="exampleRadios1" value="1">
                                    <label class="form-check-label text-secondary" for="exampleRadios1">
                                        Sí, tengo el producto y está bien
                                    </label>
                                </div>
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="radio" name="confirmacion" id="exampleRadios2" value="2">
                                    <label class="form-check-label text-secondary" for="exampleRadios2">
                                        Decidí no comprarlo
                                    </label>
                                </div>
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="radio" name="confirmacion" id="exampleRadios3" value="3">
                                    <label class="form-check-label text-secondary" for="exampleRadios3">
                                        Tuve un problema
                                    </label>
                                </div>
                                <br>
                                <button type="button" class="btn mr-3 text-light" style="background-color: rgb(10, 10, 109);">
                                    Continuar
                                </button>
                                <a href="javascript:history.back()" class="text-dark">Cancelar</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-8">
                                        <h3>¿Recomendarias al vendedor?</h3>
                                        <br>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="radio" name="confirmacion" id="exampleRadios1" value="1">
                                            <label class="form-check-label text-secondary" for="exampleRadios1">
                                                Sí
                                            </label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="radio" name="confirmacion" id="exampleRadios2" value="2">
                                            <label class="form-check-label text-secondary" for="exampleRadios2">
                                                No estoy seguro
                                            </label>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="radio" name="confirmacion" id="exampleRadios3" value="3">
                                            <label class="form-check-label text-secondary" for="exampleRadios3">
                                                No
                                            </label>
                                        </div>
                                        <br>
                                        <h4>Comparte tu opinión sobre el vendedor</h4>
                                        <textarea name="opinion" cols="50" rows="3"></textarea>
                                        <br>
                                        <button type="button" class="btn mr-3 text-light" style="background-color: rgb(10, 10, 109);">
                                            Continuar
                                        </button>
                                        <a href="javascript:history.back()" class="text-dark">Cancelar</a>
                                    </div>

                                    <div class="col-4">

                                        <div class="card-body" style="background-color: rgba(128, 128, 128, 0.096); height: 200px;">

                                            <div class="img-content-compras text-center">
                                                <img class="img-compras" src="{{ $compras->productos->images->first()->url }}" alt="{{ $compras->productos->name }}">
                                                <br>
                                                <a href="{{ route('productos.show', $compras->productos->id) }}">{{ $compras->productos->name }}</a>
                                                <br>
                                                <p style="color: rgb(172, 11, 11);">U$S {{ $compras->productos->precio }}</p>
                                                <em class="text-secondary">Vendedor: {{ $compras->productos->ventas->first()->users->name }} {{ $compras->productos->ventas->first()->users->apellido_pater }}</em>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <ul 
            class="nav nav-tabs text-center" 
            id="myTab" 
            role="tablist" 
            style="
            background-color: white; 
            width: 800px; 
            margin-left: auto; 
            margin-right: auto;
            ">
                <li class="nav-item" style="width: 50%;">
                    <a 
                    class="nav-link active" 
                    id="home-tab" 
                    data-toggle="tab" 
                    href="#home" 
                    role="tab" 
                    aria-controls="home" 
                    aria-selected="true"
                    >
                        Sobre la compra
                    </a>
                </li>
                <li class="nav-item" style="width: 50%;">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        Sobre el vendedor
                    </a>
                </li>
            </ul>

        </div>
        
    </div>

@endsection