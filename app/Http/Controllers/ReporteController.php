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

    $reportesDiarios = Reporte::with(['alumno', 'asistencia'])
    ->leftJoin('alumnos', 'reportes.alumno_id', '=', 'alumnos.id')
    ->leftJoin('asistencias', 'reportes.alumno_id', '=', 'asistencias.alumno_id')
    ->where('tipo_reporte', 'diario')
    ->whereDate('reportes.created_at', $fechaHoy);

if ($nivelSeleccionado) {
    $reportesDiarios->where('alumnos.nivel', $nivelSeleccionado);
}

if ($gradoSeleccionado) {
    $reportesDiarios->where('alumnos.grado', $gradoSeleccionado);
}

if ($seccionSeleccionada) {
    $reportesDiarios->where('alumnos.seccion', $seccionSeleccionada);
}

$reportesDiarios = $reportesDiarios->select('reportes.*', 'asistencias.tipo')
    ->groupBy('reportes.id')
    ->get();

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
