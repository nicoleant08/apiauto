<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auto;

class autocontroller extends Controller
{
    public function ListarTodos(Request $request){
        return auto::all();
    }

    public function ListarUno(Request $request, $idAuto){
        return auto::findOrFail($idAuto);
    }

    public function EliminarUno(Request $request, $idAuto){
        $auto = auto::findOrFail($idAuto);
        $auto -> delete();

        return ["mensaje" => "El auto con el id $idAuto ha sido eliminado"];
    }

    public function Insertar(Request $request){
        $auto = new auto;
        $auto -> marca = $request -> post ('marca');
        $auto -> modelo = $request -> post ('modelo');
        $auto -> color = $request -> post ('color');
        $auto -> puertas = $request -> post ('puertas');
        $auto -> cilindrado = $request -> post ('cilindrado');
        $auto -> automatico = $request -> post ('automatico');
        $auto -> electronico = $request -> post ('electronico');

        $auto -> save();
        return $auto;
    }

    public function Modificar(Request $request, $idAuto){
        $auto = auto::findOrFail($idAuto);
        
        $auto -> marca = $request -> post ('marca');
        $auto -> modelo = $request -> post ('modelo');
        $auto -> color = $request -> post ('color');
        $auto -> puertas = $request -> post ('puertas');
        $auto -> cilindrado = $request -> post ('cilindrado');
        $auto -> automatico = $request -> post ('automatico');
        $auto -> electronico = $request -> post ('electronico');

        $auto -> save();
        return $auto;
    }
}
