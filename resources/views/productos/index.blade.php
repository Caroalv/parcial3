 @extends('layouts.app')
@section('content')
<div class="container">
    <h1>
        Categorías de Producto
        <a href="{{ route('productos.create') }}" class="btn btn-success" style="margin-left: 10px;">
            <i class="fas fa-plus"></i> Agregar Producto
        </a>
        <a href="{{ route('graficos') }}" class="btn btn-primary" style="margin-left: 10px;">
            Ver Gráficos
        </a>
    </h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->categoria_id }}</td>
                <td>{{ $producto->imagen }}</td>

                <td>
                    <a href="{{ route('productos.show', ['producto' => $producto->id]) }}" class="btn btn-primary">Ver Detalles</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->links() }} <!-- Esto mostrará los enlaces de paginación -->
</div>
@endsection 

