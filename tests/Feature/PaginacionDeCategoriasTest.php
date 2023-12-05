<?php

//Este test verifica que la paginacion este funcionando. 

use App\Models\CategoriaProducto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginacionDeCategoriasTest extends TestCase
{
    use RefreshDatabase;

    public function testPaginacionDeCategorias()
    {
        // Crear manualmente 10 categorías de prueba en la base de datos
        CategoriaProducto::create(['nombre' => 'Categoria 1']);
        CategoriaProducto::create(['nombre' => 'Categoria 2']);
        CategoriaProducto::create(['nombre' => 'Categoria 3']);
        CategoriaProducto::create(['nombre' => 'Categoria 4']);
        CategoriaProducto::create(['nombre' => 'Categoria 5']);
        CategoriaProducto::create(['nombre' => 'Categoria 6']);
        CategoriaProducto::create(['nombre' => 'Categoria 7']);
        CategoriaProducto::create(['nombre' => 'Categoria 8']);
        CategoriaProducto::create(['nombre' => 'Categoria 9']);
        CategoriaProducto::create(['nombre' => 'Categoria 10']);

        // Realizar una solicitud GET a la ruta 'categorias.index'
        $response = $this->get('/categorias');

        // Verificar que la respuesta tenga un código de estado exitoso (200)
        $response->assertStatus(200);

        // Verificar que se están mostrando 5 categorías en la primera página
        $response->assertSeeInOrder(['Categoria 1', 'Categoria 2', 'Categoria 3', 'Categoria 4', 'Categoria 5']);

        // Verificar que no se está mostrando una sexta categoría en la primera página
        $response->assertDontSee('Categoria 6');
        
        // Verificar que la paginación se está mostrando en la interfaz
        $response->assertSee('pagination');
    }
}
