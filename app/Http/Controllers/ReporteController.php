<?php

namespace App\Http\Controllers;
use App\Models\AlumnosModel;
use App\Models\SalonesModel;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ReporteController extends Controller
{


public function mostrarReportes(){

    return view('reporte.reporteTipo');
}
public function mostrarlista(Request $request){

    $niveles = SalonesModel::distinct('nivel')->orderBy('nivel')->pluck('nivel');
    $grados = SalonesModel::distinct('grade')->orderBy('grade')->pluck('grade');
    $secciones = SalonesModel::distinct('section')->orderBy('section')->pluck('section');

    return view('reporte.SelAsis', compact('niveles', 'grados', 'secciones'));

}
public function mostrarReportesDiarios(Request $request)
{
    $fechaHoy = now()->toDateString();  // Obtén la fecha actual en formato YYYY-MM-DD
    $nivelSeleccionado = $request->input('nivel');
    $gradoSeleccionado = $request->input('grade');
    $seccionSeleccionada = $request->input('seccion');

    // Obtén los reportes diarios con la información de alumnos y asistencias
    $query = Reporte::with(['alumno', 'asistencia'])
    ->leftJoin('alumnos', 'reportes.alumno_id', '=', 'alumnos.id')
    ->leftJoin('asistencias', 'reportes.asistencia_id', '=', 'asistencias.id')
    ->where('tipo_reporte', 'diario')
    ->whereDate('reportes.created_at', $fechaHoy)
    ->select('reportes.*', DB::raw('asistencias.tipo as tipo_asistencia'));

    $reportesDiarios = $query->get();

    // Imprimir los datos antes de enviarlos a la vista


    // Obtener los resultados
    return view('reporte.diario', compact('reportesDiarios'));

}


public function mostrarBarraSalones(){

    $niveles = SalonesModel::distinct('nivel')->pluck('nivel');
    $grados = SalonesModel::distinct('grade')->pluck('grade');
    $secciones = SalonesModel::distinct('section')->orderBy('section')->pluck('section');

    return view('reporte.mostrarsalonesconreporte',compact('niveles', 'grados', 'secciones'));
}
public function mostrareporteMensual (){
return view('reporte.reportemensual');
}




}
