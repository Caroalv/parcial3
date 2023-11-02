<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class CategoriaController extends Controller
{
    public function index()
    {
        //$categorias = CategoriaProducto::all();
        //return view('categorias.index', compact('categorias'));
        //PAGINADOR
        $categorias = CategoriaProducto::paginate(5); // Pagina cada 5 registros
        return view('categorias.index', compact('categorias'));
    }

    public function pdf()
    {
        $categorias = CategoriaProducto::paginate();

        //return view('categorias.pdf',compact('categorias'));
        $pdf = 'PDF'::loadView('categorias.pdf',['categorias'=>$categorias]);
        return $pdf->stream();
        
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);
    
        CategoriaProducto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        return redirect()->route('categorias.index')
            ->with('success', 'Categoría de producto creada exitosamente.');
    }
    

    public function show(CategoriaProducto $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(CategoriaProducto $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, CategoriaProducto $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría de producto actualizada exitosamente.');
    }

    public function destroy(CategoriaProducto $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría de producto eliminada exitosamente.');
    }
}
