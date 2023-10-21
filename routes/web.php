<?php

use App\Http\Controllers\CrudController;
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

Route::get('/', [CrudController::class, "index"])->name("crud.index");

Route::post('/crear', [CrudController::class, "crear"])->name("crud.crear");
Route::post('/editar', [CrudController::class, "editar"])->name("crud.editar");
Route::get('/borrar/{id}', [CrudController::class, "borrar"])->name("crud.borrar");
