<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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


//PORTADA
Route::get('/', [PagesController::class, 'fnIndex'])->name('xIndex');
Route::get('/lista', [PagesController::class, 'fnLista']) ->name('xLista');

Route::get('/curso', [PagesController::class, 'fnListaCurso']) ->name('xListaCurso');
Route::get('/detalle/{id}', [PagesController::class, 'fnCurDetalle']) ->name('Curso.xCurDetalle');

Route::post('/', [PagesController::class, 'fnCurRegistrar'])->name('Curso.xCurRegistrar');

Route::get('/actualizar/{id}', [PagesController::class, 'fnCurActualizar'])->name('Curso.xCurActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnCurUpdate'])->name('Curso.xCurUpdate');


Route::delete('/eliminar/{id}', [PagesController::class, 'fnCurEliminar'])->name('Curso.xCurEliminar');


/*
//CREAR
Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');

//LEER
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');
Route::get('/lista', [PagesController::class, 'fnLista']) ->name('xLista');
//Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) -> where('numero', '[0-9]+') ->name('xGaleria');

//ACTUALIZAR
Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar']) ->name('Estudiante.xActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate']) ->name('Estudiante.xUpdate');

//ELIMINAR
Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar']) ->name('Estudiante.xEliminar');

*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});