<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('storage/codigosqr/{file}', function ($file) {

	$rutaDeArchivo = storage_path('codigosqr/'.$file);
	// $headers = array(
	// 	'Content-Type: application/pdf',
	//   );
	return response()->file($rutaDeArchivo);
    
});

Route::get('storage/firmados/{file}', function ($file) {

	$rutaDeArchivo = storage_path('firmados/'.$file);
	$headers = array(
		'Content-Type: application/pdf',
	  );
	return response()->file($rutaDeArchivo);
    
});

// http://patrimonio.test/storage/codigosqr/6.svg
Route::get('storage/documentos_word/{file}', function ($file) {

	$rutaDeArchivo = Storage::path('documentos_word/'.$file);
	$headers = array(
		'Content-Type: application/pdf',
	  );
	return response()->file($rutaDeArchivo,$headers);
    
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{any?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->where('any','.*');

