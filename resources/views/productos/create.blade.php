@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Nuevo producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio">
                </div>

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select class="form-control" id="categoria_id" name="categoria_id">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
    <label for="imagen" class="form-label">URL de la imagen</label>
    <input type="text" class="form-control" id="imagen" name="imagen">
</div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </form>
</div>
@endsection
