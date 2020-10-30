@extends('layouts.app')

@section('title', $busqueda)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('content')
    <div class="container">
        
        @livewire('filtro-component', ['busqueda' => $busqueda])

    </div>
@endsection