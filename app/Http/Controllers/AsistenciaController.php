<?php

namespace App\Http\Controllers;

use App\Models\AlumnosModel;
use App\Models\AsistenciaModel;
use App\Models\SalonesModel;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function registrarAsistencia(Request $request) {
        // Valida y procesa los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'estado' => 'required|in:asistencia,tardanza,falta',
            'alumno_id' => 'required|exists:alumnos,id',
        ]);

        // Crea un nuevo registro de asistencia
        $asistencia = new AsistenciaModel;
        $asistencia->fecha = $request->input('fecha');
        $asistencia->estado = $request->input('estado');
        $asistencia->alumno_id = $request->input('alumno_id');
        $asistencia->save();

        return redirect()->back()->with('success', 'Asistencia registrada con éxito');
    }
public function mostrarVista(){
    return view('dashboard.Asistencia.listadoSG');
}



public function mostrarAlumnos(Request $request) {
    $nivel = $request->input('nivel');
    $grado = $request->input('grade');
    $seccion = $request->input('seccion');

    // Realiza una consulta para obtener los alumnos según los criterios seleccionados
    $alumnos = AlumnosModel::where('nivel', $nivel)
        ->where('grado', $grado)
        ->where('seccion', $seccion)
        ->get();

        return view('dashboard.Asistencia.listadoSalon', ['alumnos' => $alumnos]);
}

public function mostrarFormulario() {
    $niveles = SalonesModel::distinct('nivel')->pluck('nivel');
    $grados = SalonesModel::distinct('grade')->pluck('grade');
    $secciones = SalonesModel::distinct('section')->pluck('section');

    return view('dashboard.Asistencia.listadoSG', compact('niveles', 'grados', 'secciones'));
}



}
