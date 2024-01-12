<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AlumnadoController;
use App\Http\Controllers\UsuariosConectadosController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\SalonesController;
use App\Http\Controllers\AppsTrabajo;
use App\Http\Controllers\AppsTrabajoController;
use App\Http\Controllers\enviopadre;
use App\Http\Controllers\UsuariosEnLineaController;
use App\Http\Controllers\wa;
use App\Http\Middleware\UpdateUserStatus;

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
// web.php


Route::post('/consultaralumno', [ConsultaController::class, 'consultar'])->name('consultar.alumno');

Route::get('/', function () {
    return view('login.login');
});
// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login1', [userController::class, 'showLoginForm'])->name('login.form');

Route::get('/consulta' ,function(){
    return view('login.padreconsulta');
})->name('consulta');

// Ruta para procesar los datos del formulario de inicio de sesión

Route::post('/login', [userController::class, 'submit'])->name('login.submit');

Route::get('registro', function () {
    return view('register.register');
})->name('registro');

Route::resource('register', UserController::class);

Route::group(['middleware' => ['auth', 'web','update.user.status']], function () {



    Route::prefix('dashboard')->group(function () {
        Route::get('wato',[wa::class,'notificacion']);
       Route::get('/wa',[wa::class,'index'])->name('enviar');
       Route::get('/was',[enviopadre::class,'verificarTardanza']);
        Route::get('/', [UsuariosEnLineaController::class, 'index'])->name('inicio');
        Route::get('/reportes-diarios', [ReporteController::class, 'mostrarReportesDiarios'])->name('reporte_diario');
        Route::get('/reportes-semanal', [ReporteController::class, 'mostrareporteMensual'])->name('reporte_semanal');
        Route::get('/reportes-mensual', [ReporteController::class, 'mostrarReportes'])->name('reporte_mensual');
        Route::get('/mostrar-salones', [AsistenciaController::class,'mostrarSalon'])->name('mostrarsalonparareporte');
        Route::get('/seleccionar_salon_para_reporte', [ReporteController::class, 'mostrarlista'])->name('selreporte');
        Route::post('/almacenar-reporte', [AsistenciaController::class,'almacenarReporteSalon'])->name('almacenar-reporte-salon')->withoutMiddleware(['middleware']) ;
        Route::get('/mostrar-reporte', [AsistenciaController::class,'mostrarReporte'])->name('mostrar-reporte');
        Route::get('/mostrar_usuarios', [userController::class,'mostrarusuarios'])->name('mostrarusuarios');
        Route::get('/ordenar_usuarios', [userController::class,'ordenar'])->name('ordenarusuarios');

        Route::post('/enviarReporte',[ReporteController::class,'reporteT'])->name('reportetriple');


        Route::get('/alumnos', [AlumnadoController::class , 'index'])->name('Alumnado.index');

        Route::get('alumnos/crear', [AlumnadoController::class, 'create'])->name('Alumnado.create');

        Route::get('alumnos/borrar', [AlumnadoController::class, 'delete'])->name('Alumnado.delete');
        Route::get('alumnos/editar', [AlumnadoController::class, 'edit'])->name('Alumnado.edit');
        Route::post('alumnos/store', [AlumnadoController::class, 'store'])->name('Alumnado.store');
        Route::get('alumnos/editar', [AlumnadoController::class, 'edit'])->name('Alumnado.edit');


        Route::get('/buscar-alumnos', [AlumnadoController::class,'buscarAlumnos'])->name('buscar-alumnos');
        //john//
        Route::get('/usuarios-en-linea', [userController::class, 'index']);

            Route::get('/salones', [SalonesController::class, 'index'])->name('Salones.index');
            Route::get('/salones/crear', [SalonesController::class, 'create'])->name('Salones.create');
            Route::get('/salones/{salon}/ver', [SalonesController::class, 'ver'])->name('verSalon');
            Route::get('/salones/{salon}/editar', [SalonesController::class, 'editar'])->name('editarSalon');
            Route::get('/salones/{salon}/borrar', [SalonesController::class, 'borrar'])->name('borrarSalon');

            Route::post('/salones/creating', [SalonesController::class, 'store'])->name('Salones.store');
            Route::post('/salones/edit/{id}', [SalonesController::class, 'store1'])->name('Salones.store1');

            Route::get('/salones/listarPrimaria', [SalonesController::class, 'listar'])->name('Salones.listar');
            Route::get('/salones/listarSecundaria', [SalonesController::class, 'listarS'])->name('Salones.listarS');
            Route::get('/salones/listadoPrimaria', [SalonesController::class, 'listarS1'])->name('Salones.listarS1');
            Route::get('/salones/listadoSecundaria', [SalonesController::class, 'listarS2'])->name('Salones.listarS2');
            Route::get('/salones/{id}/alumnos', [SalonesController::class,'listarAlumnosDelSalon'])->name('verAlumnosDelSalon');

            Route::get('/reportes', [ReporteController::class, 'mostrarReportes'])->name('reportes');
            // routes/web.php

            Route::get('/registrar-asistencia', [AsistenciaController::class,'mostrarFormulario'])->name('RegistrarAsistencia');
            Route::get('/mostrar-alumnos', [AsistenciaController::class,'mostrarAlumnos'])->name('mostrarAlumnosParaAsistencia');
            Route::get('/mostrar-salones', [ReporteController::class,'mostrarReportesDiarios'])->name('mostrarSalonesparaReporte');
            Route::get('/mostrar-salones_reporte', [ReporteController::class,'mostrarBarraSalones'])->name('mostrarbarrareporte');
            Route::post('/registrar-asistencias', [AsistenciaController::class, 'registrarAsistencias'])->name('registrar-asistencias');

            Route::get('/dashboard/reportes',function(){
                return view ('dashboard.Reportes.menu');})->name('reporte');
                Route::post('/anular-asistencia/{alumnoId}/{tipoAsistencia}', [AsistenciaController::class, 'anularAsistencias'])->name('anular-asistencia');
                Route::get('/dashboard/reportes/generareporte', [ReporteController::class,'generarR'])->name('genera-reporte');

    });








    });




Route::get('/logout', [userController::class,'logout'])->name('logout.custom');


Route::get('/datos-asistencia', [AsistenciaController::class, 'mostrarDatosAsistencia'])->name('datos-asistencia');
// Ejemplo en web.php


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


});
