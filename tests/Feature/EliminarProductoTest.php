<?php

//Este test verifica que el producto sea eliminado de la base de datos. 

use App\Models\Producto;
use App\Models\CategoriaProducto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EliminarProductoTest extends TestCase
{
    use RefreshDatabase;

    public function testEliminarProducto()
    {
        // Crear una categoría para asociarla al producto
        $categoria = CategoriaProducto::create([
            'nombre' => 'Categoria de Prueba',
            'descripcion' => 'Descripción de la categoría de prueba',
            // Otros campos de la categoría
        ]);

        // Crear un producto directamente en el método de prueba
        $producto = Producto::create([
            'nombre' => 'Producto de Prueba',
            'stock' => 10,
            'precio' => 29.99,
            'categoria_id' => $categoria->id,
            'imagen' => 'imagen.png',
            'qr_code' => 'qr_code_base64',
        ]);

        // Realizar una solicitud para eliminar el producto
        $response = $this->delete(route('productos.destroy', $producto));

        // Verificar que el producto haya sido eliminado de la base de datos
        $this->assertDatabaseMissing('productos', ['id' => $producto->id]);

        // Verificar que la redirección sea correcta
        $response->assertRedirect(route('productos.index'));

        // Verificar que se muestra el mensaje de éxito
        $response->assertSessionHas('success');
    }
}
