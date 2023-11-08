@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>
    
    @if ($producto)
    <div class="card" style="width: 300px; height: 400px;">
        <img src="{{ $producto->imagen }}" alt="Imagen del producto" style="width: 100%; height: 100%; object-fit: cover;">
        <div class="card-body">
            <!-- Otros detalles del producto -->
            <h5 class="card-title">{{ $producto->nombre }}</h5>
            <p class="card-text">Stock: {{ $producto->stock }}</p>
            <p class="card-text">Precio: {{ $producto->precio }}</p>
            <p class="card-text">Categoría: {{ $producto->categoria->nombre }}</p>
            <p id="codigo-qr" style="width: 100%; height: auto;">
             {!! QrCode::size(100)->generate(route('detalle-producto', $producto->id)) !!}
            </p>
            <!-- Agrega un espacio para mostrar el código QR -->
        
        </div>
    </div>
    @else
        <p>El producto no existe o no se encontró en la base de datos.</p>
    @endif
</div>
@endsection
