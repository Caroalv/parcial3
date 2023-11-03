<?php

namespace App\Http\Controllers;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\Venta; 
use App\Models\DetalleVenta; 

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
    
    public function finalizarCompra(Request $request) {
      $carritoJSON = $request->carrito;
      $carrito = json_decode($carritoJSON, true);
      foreach ($carrito as $producto) {
          echo "Nombre: " . $producto['nombre'] . "<br>";
          echo "Id: " . $producto['id'] . "<br>";
          echo "Precio: " . $producto['precio'] . "<br>";
          echo "Cantidad: " . $producto['cantidad'] . "<br>";
          echo "---------------------------<br>";
      }
      
      // Crear una nueva venta (encabezado)
      $venta = new Venta();
      $venta->fecha = now(); // Puedes establecer la fecha actual o la que corresponda
      $venta->cliente = 'Cliente de ejemplo'; // Debes proporcionar la información del cliente
      $venta->save();
  
      // Guardar el detalle de la venta
      if (is_array($carrito)) {
          foreach ($carrito as $producto) {
              $detalleVenta = new DetalleVenta();
              $detalleVenta->venta_id = $venta->id;
              $detalleVenta->producto_id = $producto['id']; 
              $detalleVenta->producto = $producto['nombre'];
              $detalleVenta->cantidad = $producto['cantidad'];
              $detalleVenta->precio = $producto['precio'];
              $detalleVenta->save();
            
               // Actualizar el stock en la tabla `productos`
             $productoModel = Producto::find($producto['id']);
                if ($productoModel) {
                    $nuevoStock = $productoModel->stock - $producto['cantidad'];
                    $productoModel->stock = $nuevoStock;
                    $productoModel->save();
               }
          }
      }
  
   
  
      return redirect()->route('confirmar');
  }      
  
  public function confirmar()
  {
     return view('confirmado');
  }
  
  

}

