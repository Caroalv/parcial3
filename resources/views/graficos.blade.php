@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gráfico de Productos en Stock por Categoría</h1>
    <canvas id="myChart" width="400" height="125"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    
    // Recuperar los datos del controlador
    var datos = @json($datos);

    var categorias = [];
    var productosEnStock = [];

    // Recorrer los datos y extraer las categorías y cantidades
    @foreach ($datos as $dato)
        categorias.push('{{ $dato['categoria'] }}');
        productosEnStock.push({{ $dato['productosEnStock'] }});
    @endforeach

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [{
                label: 'Productos en Stock',
                data: productosEnStock,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</html>
@endsection