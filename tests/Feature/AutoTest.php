<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
//necesito vincularme con el modelo
use App\Models\auto;
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

    public function test_EliminarUnoExistente()
    {
        $response = $this->delete('/api/autos/4'); //elimina el auto con el id 4

        $response->assertStatus(200);
        
        $response->assertJsonFragment([
            "mensaje" => "El auto con el id 4 ha sido eliminado"
        ]);

        $this->assertDatabaseMissing('autos',[  //busca en la base de datos que no exista un campo con esos valores
            'id' => '4',
            'deleted_at' => null
        ]);

        auto::withTrashed()->where("id",4)->restore(); //recupera el auto con el id 4
    }

    public function test_EliminarUnoInexistente(){
        $response = $this ->delete("/api/autos/80");

        $response->assertStatus(404);
    }

    public function test_modificarInexiste(){
        $response=$this->post("/api/autos/80");

        $response->assertStatus(404);
    }
 
    public function test_ModificarExistente(){
        

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

        $response=$this->post('/api/autos/3',[
            "marca"=> "Nissan",
            "modelo"=>"320",
            "color"=>"cian",
            "puertas"=>2,
            "cilindrado"=>16,
            "automatico"=>1,
            "electronico"=>1

            ]);


        $response->assertStatus(200);

        $response->assertJsonStructure($estructura);

        $response->assertJsonFragment([
            "marca"=> "Nissan",
            "modelo"=>"320",
            "color"=>"cian",
            "puertas"=>2,
            "cilindrado"=>16,
            "automatico"=>1,
            "electronico"=>1
        ]);
        
    } 

}
