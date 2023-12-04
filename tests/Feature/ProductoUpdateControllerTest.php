<?php
//Este test verifica la capacidad del controlador de productos para actualizar
//la información de un producto existente. 
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CategoriaProducto;
use App\Models\Producto;

//Utilizamos un nombre descriptivo para la clase
class ProductoUpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_update_a_producto()
    {
        // Crear una categoría de producto para asociarla al producto existente
        $categoria = CategoriaProducto::create([
            'nombre' => 'Electrónicos',
        ]);

        // Crear un producto existente en la base de datos
        $producto = Producto::create([
            'nombre' => 'Producto existente',
            'stock' => 5,
            'precio' => 29.99,
            'categoria_id' => $categoria->id,
            'imagen' => 'ruta/de/la/imagen.jpg',
        ]);

        // Datos actualizados para el producto
        $datosActualizados = [
            'nombre' => 'Producto actualizado',
            'stock' => 10,
            'precio' => 39.99,
            'categoria_id' => $categoria->id,
            'imagen' => 'ruta/actualizada/de/la/imagen.jpg',
        ];

        // Realizar una solicitud de actualización de producto
        $response = $this->put(route('productos.update', $producto->id), $datosActualizados);

        // Verificar que los datos del producto se hayan actualizado en la base de datos
        $this->assertDatabaseHas('productos', $datosActualizados);

        // Verificar que la respuesta sea una redirección a la página de índice de productos
        $response->assertRedirect(route('productos.index'));

         //Ejecutamos el test con el siguiente comando:
        //php artisan test tests/Feature/ProductoupdateControllerTest.php

    }
}
