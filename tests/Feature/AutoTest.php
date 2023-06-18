<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */



    public function test_ListarUnoExistente()
    {
        $estructura= [
            "id",
            "marca",
            "modelo",
            "color",
            "puertas",
            "cilindrado",
            "automatico",
            "electronico",
            "created_at",
            "updated_at",
            "deleted_at"
        ];
        $response = $this->get('/api/autos/3');

        $response->assertStatus(200);

        $response->assertJsonCount(11);

        $response->assertJsonStructure($estructura);
    }

    public function test_ListarUnoInexistente()
    {
        $response = $this->get('/api/autos/2354');

        $response->assertStatus(404);
    }


public function test_Listar()
    {
        $response = $this->get('/api/autos');

        $response->assertStatus(200);
    }



}
