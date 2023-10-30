@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Nueva Categoría</h1>
    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar Categoría</button>
    </form>
</div>
@endsection
