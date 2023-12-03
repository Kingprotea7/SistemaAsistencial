<?php

namespace App\Http\Controllers;

use App\Models\AlumnosModel;
use Illuminate\Http\Request;
use App\Http\Controllers\wa;
class enviopadre extends Controller
{

    public function verificarTardanza()
    {
        // Filtrar alumnos con más de 3 tardanzas
        $alumnosConMasDe3Tardanzas = AlumnosModel::where('faltas', '>=', 7)->get();

        if ($alumnosConMasDe3Tardanzas->isNotEmpty()) {

            $whatsapp=new wa();
            foreach ($alumnosConMasDe3Tardanzas as $alumno){
                $num=$alumno->num_padre;
                $numero = strval($num);
                $tardanzas=$alumno->tardanzas;
                $numero2 = strval($tardanzas);
                $nombre="alumno:".$alumno->nombre;
                $mensaje="el numero de tardanzas del $nombre esta semana es:".$numero2;
                $whatsapp->index();
            }
        } else {

            return response()->json(['success' => false, 'message' => 'Ningún alumno tiene más de 3 tardanzas.']);
        }
    }



}
