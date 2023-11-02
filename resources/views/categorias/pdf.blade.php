{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola soy tu reporte</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 
 --}}


 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Reporte de Categorías</title>
     <style>
         body {
             font-family: Arial, sans-serif;
             margin: 20px;
             background-color: #f7f7f7;
         }
 
         h1 {
             text-align: center;
             color: #007bff;
         }
 
         table {
             width: 100%;
             border-collapse: collapse;
             margin-top: 20px;
             background-color: #fff;
         }
 
         th, td {
             border: 1px solid #ddd;
             padding: 10px;
             text-align: left;
         }
 
         th {
             background-color: #f2f2f2;
         }
 
         tbody tr:nth-child(even) {
             background-color: #f2f2f2;
         }
     </style>
 </head>
 
 <body>
     <h1>Reporte de Categorías de Producto</h1>
     <table>
         <thead>
             <tr>
                 <th>Nombre</th>
                 <th>Descripción</th>
             </tr>
         </thead>
         <tbody>
             @foreach($categorias as $categoria)
             <tr>
                 <td>{{ $categoria->nombre }}</td>
                 <td>{{ $categoria->descripcion }}</td>
             </tr>
             @endforeach
         </tbody>
     </table>
 </body>
 
 </html>
 