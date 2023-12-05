<?php
//Este test es para verificar que la acción de almacenar un nuevo producto
//(store) en tu controlador ProductoController funcione correctamente.


namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CategoriaProducto;
use App\Models\Producto;

//Le damos un nombre descriptivo a la clase
class ProductoControllerTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_store_a_new_producto()
    {
        // Crear una categoría de producto para asociarla al nuevo producto
        $categoria = CategoriaProducto::create([
            'nombre' => 'Electrónicos',
            
        ]);

        // Datos de ejemplo para el nuevo producto
        $datosProducto = [
            'nombre' => 'Nuevo Producto',
            'stock' => 10,
            'precio' => 19.99,
            'categoria_id' => $categoria->id,
            'imagen' => 'ruta/de/la/imagen.jpg',
        ];

        // Realizar una solicitud de almacenamiento de producto
        $response = $this->post(route('productos.store'), $datosProducto);

        // Verificar que el producto se haya almacenado en la base de datos
        $this->assertDatabaseHas('productos', $datosProducto);

        // Verificar que la respuesta sea una redirección a la página de índice de productos
        $response->assertRedirect(route('productos.index'));

        //Ejecutamos el test con el siguiente comando:
        //php artisan test --filter it_can_store_a_new_producto

    }
}
