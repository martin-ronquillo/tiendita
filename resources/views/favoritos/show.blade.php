@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/favoritos.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-5 ml-5"><b>Favoritos</b></h2>
        </div>
        
        <div class="col-12">
            
            <div class="card ml-5">
                <div class="card-body">
                    
                    @if (@$favoritos->count() >= 1)
                        
                        @foreach ($favoritos as $item)

                            <ul class="lista w-100 mt-2 mb-2">
                                <li class="lista-item-non-border w-100">
                    
                                    <div class="row">
            
                                        <div class="col-3">
                                            <div class="img-content-compras text-center">
                                                @if (@$item->productos->images->first())
                                                    <img class="img-compras" src="{{ $item->productos->images->first()->url }}" alt="{{ $item->productos->name }}">
                                                @else
                                                    <img class="img-compras" src="{{ asset('images/no-image.png') }}" alt="no-image">
                                                @endif
                                            </div>
                                        </div>
            
                                        <div class="col-6">
                                            <h5 class="text-secondary">{{$item->productos->name}}</h5>
                                            <p><h3>U$S {{$item->productos->precio}}</h3></p>
                                        </div>
            
                                        <div class="col-3 text-right mt-4">
                                            <a href="{{ route('productos.show', $item->productos->id) }}" class="btn btn-primary">Ver articulo</a>
                                        </div>
            
                                    </div>
                
                                </li>
                            </ul>
                            
                            <hr>
                            
                        @endforeach

                    @else
                        
                        <h5 class="mt-3 ml-5 mr-5">Aun no has agregado ningun favorito...  <a href="{{ route('home') }}">¡Empecemos con eso!</a></h5>

                    @endif

                </div>
            </div>
    
        </div>
    </div>
</div>
@endsection