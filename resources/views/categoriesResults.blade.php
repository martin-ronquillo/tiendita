@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('content')
    <div class="container">
        
        @livewire('filtro-categories-component', ['busqueda' => $busqueda])

    </div>
@endsection