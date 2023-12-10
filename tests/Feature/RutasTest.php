<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RutasTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_Grafica(): void
    {
        $response = $this->get('/graficos');

        $response->assertStatus(200);
    }

    public function test_Home(): void
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    public function test_Catalog(): void
    {
        $response = $this->get('/catalogo');

        $response->assertStatus(200);
    }

    public function test_Confirm(): void
    {
        $response = $this->get('/confirmar');

        $response->assertStatus(200);
    }
}
