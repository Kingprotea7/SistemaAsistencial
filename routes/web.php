<?php

use App\Http\Controllers\AlumnadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\SalonesController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('register',userController::class);

Route::get('login',function(){
    return view('register.register');
});

Route::get('dashboard',function(){
return view('dashboard.dashboard');
})->name('inicio');

Route::prefix('dashboard')->group(function () {
    Route::get('/alumnos', [AlumnadoController::class, 'index'])->name('Alumnado.index');
    Route::get('alumnos/crear', [AlumnadoController::class, 'create'])->name('Alumnado.create');
    Route::get('alumnos/borrar', [AlumnadoController::class, 'delete'])->name('Alumnado.delete');
    Route::get('alumnos/editar', [AlumnadoController::class, 'edit'])->name('Alumnado.edit');

});

Route::prefix('dashboard')->group(function () {
    Route::get('/salones', [SalonesController::class, 'index'])->name('Salones.index');
    Route::get('/salones/crear', [SalonesController::class, 'create'])->name('Salones.create');
    Route::get('/salones/borrar', [SalonesController::class, 'delete'])->name('Salones.delete');
    Route::get('/salones/editar', [SalonesController::class, 'edit'])->name('Salones.edit');
    Route::post('/salones/creating', [SalonesController::class, 'store'])->name('Salones.store');

});


