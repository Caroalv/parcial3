<?php

namespace App\Http\Controllers;
use App\Models\CategoriaProducto;
// Asegúrate de importar el modelo de Categoría
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }
    
    public function create()
    {
        $categorias = CategoriaProducto::all(); // Cargar todas las categorías desde la base de datos
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;
        $producto->imagen = $request->imagen; // Asignar la URL de imagen proporcionada por el usuario
    
        $producto->save();
        // Redirigir al usuario a la página de índice de productos
        return redirect()->route('productos.index');
    }
    
    
    
    

    public function edit(Producto $producto)
    {
        $categorias = CategoriaProducto::all(); // Obtener todas las categorías
        return view('productos.edit', compact('producto', 'categorias'));;
       
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->input('nombre');
        $producto->stock = $request->input('stock');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->imagen = $request->input('imagen');
        $producto->save();
    
        // Puedes agregar un mensaje de éxito o redirección a la página de listado de productos
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }
    

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Categoría de producto eliminada exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    

}
