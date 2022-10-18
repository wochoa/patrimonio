<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvokerController;

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

Route::get('storage/documentos_word/{file}', function ($file) {

	$rutaDeArchivo = Storage::path('documentos_word/'.$file);
	$headers = array(
		'Content-Type: application/pdf',
	  );
	return response()->file($rutaDeArchivo,$headers);
    
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{any?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->where('any','.*');
