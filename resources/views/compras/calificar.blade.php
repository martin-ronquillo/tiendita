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
    
            <form action="{{ route('opinion.store') }}" method="post">
                @csrf
    
                <div class="tab-content" id="myTabContent" style="width: 800px; margin-left: auto; margin-right: auto;">
                    @include('compras.complements.first-step')
    
                    @include('compras.complements.second-step')
                </div>
    
            </form>
    
        </div>
        
    </div>

@endsection