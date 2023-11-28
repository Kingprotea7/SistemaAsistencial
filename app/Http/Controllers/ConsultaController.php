<?php

namespace App\Http\Controllers;

use App\Models\AlumnosModel;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{


    public function consultar(Request $request)
    {
        // Validar el formulario
        $request->validate([
            'identificador' => 'required|exists:alumnos,numero_aleatorio',
        ], [
            'identificador.exists' => 'El código de alumno no existe. Por favor, verifique e intente nuevamente.',
        ]);

        // Obtener el identificador del formulario
        $identificador = $request->input('identificador');

        // Buscar al alumno por numero_aleatorio
        $alumno = AlumnosModel::where('numero_aleatorio', $identificador)->first();

        // Verificar si se encontró el alumno
        if ($alumno) {
            // Mostrar la información del alumno
            return view('login.resultado', ['alumno' => $alumno]);
        } else {
            // Redirigir con un mensaje de error si no se encontró el alumno
            return redirect()->route('consulta')->withErrors(['identificador' => 'Credenciales incorrectas :( ']);

        }
    }

}
