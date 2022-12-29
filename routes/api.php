<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Administrador\UserController;
use App\Http\Controllers\Administrador\Categorias;
use App\Http\Controllers\Administrador\Marca;
use App\Http\Controllers\Administrador\Modelo;
use App\Http\Controllers\Administrador\Movimientobien;
use App\Http\Controllers\Administrador\Listadobien;
use App\Http\Controllers\Administrador\series;
use App\Http\Controllers\Administrador\Colres;
use App\Http\Controllers\Administrador\Estado;
use App\Http\Controllers\InvokerController;

use App\Http\Controllers\Bienescontroller;

use App\Http\Controllers\formatospdf;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('generaword/{id}', [TramitesController::class, 'generaword'])->name('generaword');



route::get('/listauser',[UserController::class, 'index'])->name('usuarios');
route::get('/listauser/{id}',[UserController::class, 'buscar'])->name('buscarusuarios');//
route::get('/usuarioxdni/{dni}',[UserController::class, 'buscardni'])->name('usuarioxdni');
route::get('/listauserdepe/{id}',[UserController::class, 'listauserdepe'])->name('listauserdepe');
route::get('/representante/{id}',[UserController::class, 'representante'])->name('representante');
route::get('/detalleuserderivacion/{id}',[UserController::class, 'detalleuserderivacion'])->name('detalleuserderivacion');

// categorias
route::get('/categorias',[categorias::class, 'index'])->name('categorias.index');
route::post('/agregacategorias',[categorias::class, 'agregar'])->name('categorias.agregar');

// MARCA
route::get('/marcalista',[Marca::class, 'index'])->name('marca.index');
route::get('/marcaxcat/{idcat}',[Marca::class, 'marcaxcat'])->name('marca.marcaxcat');
route::post('/agregamarca',[Marca::class, 'agregar'])->name('marca.agregar');

// MODELO
route::get('/modelolista',[Modelo::class, 'index'])->name('modelo.index');
route::get('/modelolista/{idmarca}',[Modelo::class, 'modeloxmarca'])->name('modelo.modeloxmarca');
route::post('/agregamodelo',[Modelo::class, 'agregar'])->name('modelo.agregar');

//SERIES
route::get('/series',[series::class, 'index'])->name('series.index');
route::get('/series/{idmodelo}',[series::class, 'seriexmodelo'])->name('series.seriexmodelo');
route::post('/agregaserie',[series::class, 'agregar'])->name('series.agregar');

// colores
route::get('/colores',[Colres::class, 'index'])->name('Colores.index');
route::post('/agregacolores',[Colres::class, 'agregar'])->name('Colores.agregar');

//estado
route::get('/estado',[Estado::class, 'index'])->name('estado.index');
route::post('/agregaestado',[Estado::class, 'agregar'])->name('estado.agregar');

//REGISTRO BIEN

route::post('/registrobien',[Bienescontroller::class, 'agregarbien'])->name('Bienes.agregarbien');//listabien
route::get('/listabien',[Bienescontroller::class, 'index'])->name('Bienes.listabien');
route::get('/verbien/{id}',[Bienescontroller::class, 'verbien'])->name('Bienes.verbien');
route::get('/editarbien/{id}',[Bienescontroller::class, 'editarbien'])->name('Bienes.editarbien');
route::get('/buscarbien/{id}',[Bienescontroller::class, 'buscarbien'])->name('Bienes.buscarbien');

route::get('/listamotivo',[Bienescontroller::class, 'listamotivo'])->name('Bienes.listamotivo');
route::post('/asignacionbien',[Bienescontroller::class, 'asignacionbien'])->name('Bienes.asignacionbien');
route::get('/bienesasignados/{dni}',[Bienescontroller::class, 'bienesasignados'])->name('bienesasignados');

// generar CARGO PERSONAL F7
route::get('/cargopersonal/{dni}',[formatospdf::class, 'cargopersonal'])->name('cargopersonal');

// codigo qr
Route::get('/qrcode/{id}', [Bienescontroller::class, 'qrcode'])->name('Bienes.qrcode');

Route::get('/invoker/postArguments',[InvokerController::class, 'postArguments'])->name('invoker.postArguments');
Route::get('/invoker/upload',[InvokerController::class, 'upload'])->name('invoker.upload');
Route::get('/invoker/getArguments',[InvokerController::class, 'getArguments'])->name('invoker.getArguments');
// Route::get('invoker/getFile',[InvokerController::class, 'getFile'])->name('invoker.getFile');
// Route::get('documento/printR/{idFile}/{idDocumento}',[InvokerController::class, 'printPdfR'])->name('invoker.printPdfRefirma');
   
