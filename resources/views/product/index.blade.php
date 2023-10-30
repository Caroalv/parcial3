<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    HOLA SE;ORES Y SE;RAS
</body>
</html>

<form action="{{route('product.store')}}" method="POST" class="mb-3">
@csrf
<!-- Botón para redirigir a la página de gráficas -->
</div>
<table id="example"class="table">
  <thead>
    <tr>
      <th scope="col">nombre</th>
      <th scope="col">stok</th>
      <th scope="col">precio</th>
      <th scope="col">categoria</th>
      <th scope="col">imagen</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($task as $task)
        <tr>
          <td>{{ $task->titulo }}</td>
          <td>{{ $task->descripcion }}</td>
          <td>{{ $task->estado ==1 ? 'activo' : 'inactivo'}}</td>
          
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                  <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verModal{{ $task->id }}">Detalle</button>
                  </div>
</form>
</html>