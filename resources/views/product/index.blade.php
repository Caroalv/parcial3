<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Crear Producto</h1>
        <form action="{{ route('product.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <div class="mb-3">
    <label for="Stock" class="form-label">Stock del Producto</label>
    <input type="text" class="form-control" id="Stock" name="Stock">
</div>


            <div class="mb-3">
                <label for="precio" class="form-label">Precio del Producto</label>
                <input type="text" class="form-control" id="precio" name="precio">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría del Producto</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>

            <div class="mb-3">
                <label for "imagen" class="form-label">Imagen del Producto</label>
                <input type="text" class="form-control" id="imagen" name="imagen">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>

    <div class="container">
        <h2>Listado de Productos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->Stok }}</td>
                    <td>{{ $product->precio }}</td>
                    <td>{{ $product->categoria }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('product.edit', $product) }}" class="btn btn-primary">Editar</a>

                            <form action="{{ route('product.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
