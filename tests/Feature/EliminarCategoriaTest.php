<?php

//Este test verifica que la categoria sea eliminada de la base de datos. 

use App\Models\CategoriaProducto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EliminarCategoriaTest extends TestCase
{
    //use RefreshDatabase;

    public function testEliminarCategoria()
    {
        // Crear una categoría directamente en el método de prueba
        $categoria = CategoriaProducto::create([
            'nombre' => 'Categoria de Prueba',
            'descripcion' => 'Descripción de la categoría de prueba',
            // Otros campos de la categoría
        ]);

        // Realizar una solicitud para eliminar la categoría
        $response = $this->delete(route('categorias.destroy', $categoria));

        // Verificar que la categoría haya sido eliminada de la base de datos
        $this->assertDatabaseMissing('categoria', ['id' => $categoria->id]);

        // Verificar que la redirección sea correcta
        $response->assertRedirect(route('categorias.index'));

        // Verificar que se muestra el mensaje de éxito
        $response->assertSessionHas('success');
    }
}
