@extends('layouts.app')
@section('title', 'Inicio') 
@section('styles')
<link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
@endsection

@section('content')
<div class="container">
    <form name="searchForm" action="{{ route('search-categorie') }}" method="GET">
        @csrf
        <div class="row">

            <h1 class="col-12 mb-4">Categorias</h1>

                @foreach ($categorias as $item)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 categorias">
                        <button 
                            type="submit" 
                            name="search" 
                            value="{{ $item->id }}"
                            class="text-center nav-link stretched-link link-change btn-card"
                        >
                            <p class="text-center text-secondary">
                                <i class="{{ $item->icon }} fa-6x"></i>
                            </p>
                            <b><p>{{ $item->categoria }}</p></b>
                        </button>
                    </div>
                   {{-- <li class="list-group-item h-100">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 categorias">
                                <p class="text-center text-secondary">
                                    <i class="{{ $item->icon }} fa-6x"></i>
                                </p>
                                <input type="hidden" name="categoria" value="{{ $item->id }}">
                                <a href="javascript:enviar_formulario()" class="text-center nav-link stretched-link link-change">
                                    <b><p>{{ $item->categoria }}</p></b>
                                </a>
                            </div>
                        </div>
                    </li>--}}
                @endforeach

        </div>
    </form>
</div>

@endsection
@push('scripts')
    
<script>
</script>

@endpush
