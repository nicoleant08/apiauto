<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\autocontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/autos",[autocontroller::class,"ListarTodos"]);

Route::get("/autos/{d}",[autocontroller::class,"ListarUno"]);

Route::delete("/autos/{d}",[autocontroller::class,"EliminarUno"]);

Route::post("/autos",[autocontroller::class,"Insertar"]);

Route::post("/autos/{d}",[autocontroller::class,"Modificar"]);

