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

Route::get('storage/codigosqr/{file}', function ($file) {

	$rutaDeArchivo = storage_path('codigosqr/'.$file);
	// $headers = array(
	// 	'Content-Type: application/pdf',
	//   );
	return response()->file($rutaDeArchivo);
    
});

http://patrimonio.test/storage/codigosqr/6.svg





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{any?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->where('any','.*');
