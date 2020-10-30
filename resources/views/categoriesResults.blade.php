@php
    if (@App\Categoria::where('id', $busqueda)->first()->categoria) {
        $busquedaInfo = App\Categoria::where('id', $busqueda)->first()->categoria;
    }else{
        $busquedaInfo = $busqueda;
    }
@endphp

@extends('layouts.app')

@section('title', $busquedaInfo)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('content')
    <div class="container">
        
        @livewire('filtro-categories-component', ['busqueda' => $busqueda])

    </div>
@endsection