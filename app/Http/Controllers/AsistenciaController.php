<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\AlumnosModel;
use App\Models\AsistenciaModel;
use App\Models\SalonesModel;
use Illuminate\Http\Request;
use App\Models\Reporte; // Ajusta el namespace según la ubicación de tu modelo

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
        $asistencia->anulado = false;
        $asistencia->save();

        return redirect()->back()->with('success', 'Asistencia registrada con éxito');
    }
public function mostrarVista(){
    return view('dashboard.Asistencia.listadoSG');
}

public function almacenarReporteSalon(Request $request)
{
    try {
        // Validación de los datos del formulario (ajusta según tus campos)
        $request->validate([
            'tipo_reporte' => 'required|string',
            'dia' => 'required_if:tipo_reporte,diario|string',
            'semana' => 'required_if:tipo_reporte,semanal|string',
            'mes' => 'required_if:tipo_reporte,mensual|string',
            // Agrega aquí las reglas de validación para otros campos según tu necesidad
        ]);

        // Obtén los datos del formulario
        $tipoReporte = $request->input('tipo_reporte');
        $dia = $request->input('dia');
        $semana = $request->input('semana');
        $mes = $request->input('mes');
      
        // Loguear información para verificar flujo del programa
        Log::info('Datos del formulario:', [
            'tipo_reporte' => $tipoReporte,
            'dia' => $dia,
            'semana' => $semana,
            'mes' => $mes,
        ]);
        Log::info('URL completa: ' . $request->fullUrl());


        // Obtén los parámetros de la consulta
        $nivel = $request->query('nivel');
        $grado = $request->query('grade'); // Corregí el nombre del parámetro
        $seccion = $request->query('seccion');

        Log::info('Nivel: ' . $nivel);
        Log::info('Grado: ' . $grado);
        Log::info('Sección: ' . $seccion);

        // Obtén los alumnos que cumplen con los criterios
        $alumnos = AlumnosModel::where('nivel', $nivel)
            ->where('grado', $grado)
            ->where('seccion', $seccion)
            ->get();

        Log::info('Número de alumnos en la colección: ' . $alumnos->count());

        // Itera sobre los alumnos y almacena el reporte
       foreach ($alumnos as $alumno) {
    $alumno->reportes()->create([
        'tipo_reporte' => $tipoReporte,
        'dia' => $dia,
        'semana' => $semana,
        'mes' => $mes,

        // Otros campos según tu necesidad
    ]);
}


        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Reporte almacenado con éxito');
    } catch (\Exception $e) {
        Log::error('Error al almacenar el reporte: ' . $e->getMessage());
        // Manejar cualquier error que pueda ocurrir durante el proceso de almacenamiento
        // En el catch del controlador
        return redirect()->back()->with('error', 'Error al almacenar el reporte: ' . $e->getMessage());
    }
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

        return view('dashboard.Asistencia.listadoSalon', [
            'alumnos' => $alumnos,
            'nivel' => $nivel,
            'grado' => $grado,
            'seccion' => $seccion,
        ]);
}

public function mostrarSalon(Request $request) {
    $nivel = $request->input('nivel');
    $grado = $request->input('grade');
    $seccion = $request->input('seccion');


    // Realiza una consulta para obtener los alumnos según los criterios seleccionados
    $alumnos = AlumnosModel::where('nivel', $nivel)
        ->where('grado', $grado)
        ->where('seccion', $seccion)
        ->get();

        return view('reporte.SelAsis', [
            'alumnos' => $alumnos,
            'nivel' => $nivel,
            'grado' => $grado,
            'seccion' => $seccion,
        ]);
}

public function mostrarFormulario() {
    $niveles = SalonesModel::distinct('nivel')->orderBy('nivel')->pluck('nivel');
    $grados = SalonesModel::distinct('grade')->orderBy('grade')->pluck('grade');
    $secciones = SalonesModel::distinct('section')->orderBy('section')->pluck('section');

    return view('dashboard.Asistencia.listadoSG', compact('niveles', 'grados', 'secciones'));
}

public function registrarAsistencias(Request $request) {
    $alumnoId = $request->input('alumno_id');
    $estado = $request->input('estado');
    $tipo = $request->input('tipoAsistencia');
    $fecha = now();
    $tipoReporte = $request->input('tipo_reporte');


    $alumno = AlumnosModel::find($alumnoId);
// Agrega esto en tu controlador para depuración
Log::info('Estado: ' . $estado);
Log::info('Asistencia Registrada: ' . $alumno->asistencia_registrada);
// ... y así sucesivamente para otras variables

    // Crear un nuevo registro de asistencia
    $asistencia = new AsistenciaModel;
    $asistencia->fecha = $fecha;
    $asistencia->alumno_id = $alumnoId;
    $asistencia->salon_id = $alumno->salon_id; // Ajusta esto según tu lógica de negocio
    $asistencia->tipo = $tipo;
    $asistencia->save();

    // Actualizar las estadísticas del alumno
    if ($estado === 'anular') {
        $alumno->asistencia_registrada = false;
        $alumno->tardanza_registrada = false;
        $alumno->falta_registrada = false;
        $ultimaAsistencia = AsistenciaModel::where('alumno_id', $alumnoId)->latest()->first();
        if ($ultimaAsistencia) {
            $ultimaAsistencia->delete();
        }
    } elseif ($estado === 'asistio') {
        $alumno->asistencia_registrada = true;
        $alumno->tardanza_registrada = false;
        $alumno->falta_registrada = false;
        $alumno->asistencias++;
    } elseif ($estado === 'tarde') {
        $alumno->asistencia_registrada = false;
        $alumno->tardanza_registrada = true;
        $alumno->falta_registrada = false;
        $alumno->tardanzas++;
    } elseif ($estado === 'falta') {
        $alumno->asistencia_registrada = false;
        $alumno->tardanza_registrada = false;
        $alumno->falta_registrada = true;
        $alumno->faltas++;
    }

    $alumno->save();

    return redirect()->back()->with('success', 'Asistencia registrada con éxito');
}

// ... (código anterior en tu controlador)

// ... (código anterior en tu controlador)
public function mostrarDatosAsistencia(Request $request) {
    // Puedes obtener todos los datos de asistencia aquí si es necesario
    $datosAsistencia = AsistenciaModel::all();

    // Luego, devuelve la vista con los datos
    return view('login.tipo', ['datosAsistencia' => $datosAsistencia]);
}
public function registrarAsistenciass(Request $request) {
    // ... (lógica para guardar en la base de datos) ...

    // Obtén el ID del alumno
    $alumnoId = $request->input('alumno_id');

    // Obtén los datos de asistencia recién guardados
    $datosAsistencia = AsistenciaModel::where('alumno_id', $alumnoId)->get();

    // Pasa los datos a la vista
    return view('datos_asistencia', ['datosAsistencia' => $datosAsistencia]);
}
public function mostrarReporte(Request $request)
{
    $tipoReporte = $request->input('tipo_reporte');
    $dia = $request->input('dia');
    $semana = $request->input('semana');
    $mes = $request->input('mes');

    // Realiza la consulta según el tipo de reporte seleccionado
    $reportes = Reporte::where('tipo_reporte', $tipoReporte);

    if ($tipoReporte === 'diario') {
        $reportes->where('dia', $dia);
    } elseif ($tipoReporte === 'semanal') {
        $reportes->where('semana', $semana);
    } elseif ($tipoReporte === 'mensual') {
        $reportes->where('mes', $mes);
    }

    $datosReporte = $reportes->get();

    return view('reporte.reporte', ['datosReporte' => $datosReporte]);
}






public function anularAsistencias($alumnoId, Request $request, $tipoAsistencia) {
    // Encuentra al alumno
    $alumno = AlumnosModel::find($alumnoId);
    $ultimaAsistencia = AsistenciaModel::where('alumno_id', $alumnoId)
    ->where('tipo', $tipoAsistencia)
    ->latest('fecha')
    ->first();
    if ($ultimaAsistencia) {
        // Eliminar la última asistencia encontrada
        $ultimaAsistencia->delete();
    }
    // Verifica si hay alguna asistencia registrada
    if ($tipoAsistencia === 'asistencia' && $alumno->asistencia_registrada) {
        // Revierte las estadísticas de asistencia
        $alumno->asistencias--;
        $alumno->asistencia_registrada = false;
    } elseif ($tipoAsistencia === 'tardanza' && $alumno->tardanza_registrada) {
        // Revierte las estadísticas de tardanza
        $alumno->tardanzas--;
        $alumno->tardanza_registrada = false;
    } elseif ($tipoAsistencia === 'falta' && $alumno->falta_registrada) {
        // Revierte las estadísticas de falta
        $alumno->faltas--;
        $alumno->falta_registrada = false;
    } else {
        // Maneja el caso en el que no haya asistencia registrada (esto depende de tu lógica de negocio)
        return redirect()->back()->with('error', 'No se encontró asistencia registrada para anular');
    }

    // Guarda los cambios en la base de datos
    $alumno->save();

    // Redirige de vuelta a la página de listado de alumnos con un mensaje de confirmación.
    return redirect()->back()->with('success', 'Asistencia anulada con éxito');
}






}
