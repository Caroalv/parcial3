<?php

namespace App\Http\Controllers;

use  App\Models\producto;

use Illuminate\Http\Request;

class productocontoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = producto::all();
        return view('product.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto = new producto();
        $producto->nombre = $request->nombre;
        $producto->Stock = $request->Stock;
        $producto->precio = $request->precio;
        $producto->categoria = $request->categoria;
        $producto->imagen = $request->imagen;
        $producto->save();
        return redirect()->route('product.index');
    }
    public function update(Request $request, Product $product)
    {
        $product->nombre = $request->input('nombre');
        $product->stok = $request->input('stok');
        $product->precio = $request->input('precio');
        $product->categoria = $request->input('categoria');
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy(producto $product)
    {
        $product->delete();
    
        return redirect()->route('product.index');
    }
    
    public function edit(producto $product)
{
    return view('product.edit', compact('product'));
}



}
