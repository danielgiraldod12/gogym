<?php

use App\Http\Controllers\DatatablesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\ShowController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;



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

// A cada ruta le paso una funcion , un controlador, una clase y un nombre
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('imc', [ImcController::class, 'cimc'])->name('imc');

Route::post('home', [ HomeController::class,'store'])->name('contactanos.store');//para enviar el correo




/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/



