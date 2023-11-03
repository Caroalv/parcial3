@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="welcome-message">
                <h1 class="text-center">¡Bienvenido a Nuestro Proyecto!</h1>
                <p class="text-center"><a href="{{ route('catalogo') }}" class="btn btn-primary" style="margin-left: 10px;">
            Ir a catalogo de ventas
        </a></p>
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .welcome-message {
        background-image: url('/images/background.jpg'); /* Ruta a tu imagen de fondo */
        background-size: cover;
        background-position: center;
        color: white;
        padding: 20px;
        text-align: center;
    }
    .welcome-message h1, .welcome-message p {
        color: white;
    }
</style>
@endpush
