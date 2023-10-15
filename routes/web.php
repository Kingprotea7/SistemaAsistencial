<?php

use App\Http\Controllers\AlumnadoController;
use App\Http\Controllers\AsistenciaController;
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
Route::resource('login',userController::class);

Route::get('registro',function(){
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
    Route::post('alumnos/store', [AlumnadoController::class, 'store'])->name('Alumnado.store');

    Route::get('/buscar-alumnos', [AlumnadoController::class,'buscarAlumnos'])->name('buscar-alumnos');


});

Route::prefix('dashboard')->group(function () {
    Route::get('/salones', [SalonesController::class, 'index'])->name('Salones.index');
    Route::get('/salones/crear', [SalonesController::class, 'create'])->name('Salones.create');
    Route::get('/salones/{salon}/ver', [SalonesController::class, 'ver'])->name('verSalon');
    Route::get('/salones/{salon}/editar', [SalonesController::class, 'editar'])->name('editarSalon');
    Route::get('/salones/{salon}/borrar', [SalonesController::class, 'borrar'])->name('borrarSalon');

    Route::post('/salones/creating', [SalonesController::class, 'store'])->name('Salones.store');
    Route::get('/salones/listarPrimaria', [SalonesController::class, 'listar'])->name('Salones.listar');
    Route::get('/salones/listarSecundaria', [SalonesController::class, 'listarS'])->name('Salones.listarS');
    Route::get('/salones/listadoPrimaria', [SalonesController::class, 'listarS1'])->name('Salones.listarS1');
    Route::get('/salones/listadoSecundaria', [SalonesController::class, 'listarS2'])->name('Salones.listarS2');
    Route::get('/salones/{id}/alumnos', [SalonesController::class,'listarAlumnosDelSalon'])->name('verAlumnosDelSalon');
});

Route::get('/registrar-asistencia', [AsistenciaController::class,'mostrarFormulario'])->name('RegistrarAsistencia');
Route::get('/mostrar-alumnos', [AsistenciaController::class,'mostrarAlumnos'])->name('mostrarAlumnosParaAsistencia');




