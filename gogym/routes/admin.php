<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

/* Este archivo de rutas con la propiedad auth, sirve para que solo se pueda
acceder a estas rutas cuando el usuario este autenticado, haciendo uso del
RouteServiceProvider */


// A cada ruta le paso un metodo, una ruta, un controlador, una clase y un nombre

//Dashboard y CRUD Users
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('users', [AdminController::class, 'users'])->name('users');

Route::get('users/create', [AdminController::class, 'create'])->name('create');

Route::post('crear', [AdminController::class, 'crear'])->name('crear');

Route::get('users/{id}/edit', [AdminController::class, 'edit'])->name('edit');

Route::put('users/{id}', [AdminController::class, 'update'])->name('update');

Route::delete('users/{id}/delete', [AdminController::class, 'destroy'])->name('destroy');

//CRUD Ficha
Route::get('record_nums', [AdminController::class, 'record_num'])->name('record_num');

Route::get('record_nums/creatern', [AdminController::class, 'creatern'])->name('creatern');

Route::post('crearrn', [AdminController::class, 'crearrn'])->name('crearrn');

Route::get('record_nums/{id}/edit', [AdminController::class, 'editrn'])->name('editrn');

Route::put('record_nums/{id}', [AdminController::class, 'updatern'])->name('updatern');

Route::delete('record_nums/{id}/delete', [AdminController::class, 'destroyrn'])->name('destroyrn');

//CRUD Eventos
Route::get('events', [AdminController::class, 'events'])->name('events'); //vista donde visualizare los eventos 

Route::get('events/createevents', [AdminController::class, 'createevents'])->name('createevents'); //vista para ir al formulario de crear eventos

Route::post('crearevents', [AdminController::class, 'crearevents'])->name('crearevents'); // le paso la funcion de crear eventos

Route::get('events/{id}/edit', [AdminController::class, 'editevents'])->name('editevents'); //vista paar editar los eventos

Route::put('events/{id}', [AdminController::class, 'updateevents'])->name('updateevents');//ruta pra actualizar los eventos

Route::delete('events/{id}/delete', [AdminController::class, 'destroyevents'])->name('destroyevents');

//Perfil
Route::get('profile', [AdminController::class, 'profile'])->name('dashboard.profile');


//Graficas usuarios
Route::get('dashboard/chart1', [ChartController::class, 'chart1'])->name('chart.first');

Route::get('dashboard/chart2', [ChartController::class, 'chart2'])->name('chart.second');

