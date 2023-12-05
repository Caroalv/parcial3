<?php


//Este test verifica que la solicitud para generar el PDF tenga una respuesta exitosa (estado 200). 

use App\Http\Controllers\ProductoController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenerarPdfTest extends TestCase
{
    // Usa el trait RefreshDatabase para migrar y volver a cargar la base de datos durante las pruebas
    //use RefreshDatabase;

    // Define la función de prueba
    public function testGenerarPdf()
    {
        // Hace una solicitud GET a la URL /generar-pdf
        $response = $this->get('/generar-pdf');

        // Asegura que la respuesta tenga un código de estado 200 (OK)
        $response->assertStatus(200);

        // Se puede agregar más aserciones según sea necesario para verificar el contenido, redirecciones, etc.
        // Por ejemplo:
        // $response->assertViewIs('nombre_de_la_vista'); // Asegura que se use una vista específica
        // $response->assertSee('Texto en la página'); // Asegura que cierto texto esté presente en la respuesta
    }
}
