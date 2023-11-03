<?php

namespace App\Http\Controllers;
use App\Models\CategoriaProducto;
use App\Models\Producto;

use Illuminate\Http\Request;


class CatalogoController extends Controller
{
    public function mostrarCatalogo()
    {
       $productos = Producto::paginate(5); // Pagina cada 5 registros
       return view('catalogo', compact('productos'));
    }
    public function mostrarCheckout()
    {
       return view('checkout');
    }
    

}

