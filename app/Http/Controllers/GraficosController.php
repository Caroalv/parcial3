<?php

namespace App\Http\Controllers;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;


class GraficosController extends Controller
{
    public function mostrarGrafico()
    {
        // Obtener todas las categorías de productos
        $categorias = CategoriaProducto::all();
        
        // Inicializar un array de datos vacío
        $datos = [];

        // Recorrer todas las categorías
        foreach ($categorias as $categoria) {
            // Obtener la cantidad de productos en stock para esta categoría
            $productosEnStock = Producto::where('categoria_id', $categoria->id)->sum('stock');
            // Agregar los datos al array
            $datos[] = [
                'categoria' => $categoria->nombre,
                'productosEnStock' => $productosEnStock,
            ];
        }

        return view('graficos', compact('datos'));
    }
}

