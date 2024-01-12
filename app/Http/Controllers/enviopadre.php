<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\AlumnosModel;
use Illuminate\Http\Request;
use App\Http\Controllers\wa;
use App\Events\InasistenciasSuperadas;

class enviopadre extends Controller
{

    public function verificarTardanza()
    {

        $alumnosConMasDe3Tardanzas = AlumnosModel::where('tardanzas', '>=', 10)->get();

        if ($alumnosConMasDe3Tardanzas->isNotEmpty()) {

            $whatsapp=new wa();

            foreach ($alumnosConMasDe3Tardanzas as $alumno){
                
                $num=$alumno->num_padre;

                $numero = strval($num);
                $whatsapp->notificacion( $numero);
                $tardanzas=   $alumno->getTardanzas();
                $numero2 = strval($tardanzas);
                $apellido1=$alumno->apellido();
                $apellido2=$alumno->lastname2();
                $nombre="Alumn@:".$alumno->nombre." ".$apellido1." ".$apellido2;
                setlocale(LC_TIME, 'es_ES');


                $fechaActual = date('l, j, F');




                $mensaje="Informe de conducta \nI.E Lucia Quispe Nina\n________________________________________________________________________\n"." $fechaActual"."\n"."El $nombre \nEsta semana tiene un total de tardanzas de: $tardanzas". "\n";
                $whatsapp->index($numero,$mensaje);
            }
        } else {

            return response()->json(['success' => false, 'message' => 'Ningún alumno tiene más de 3 tardanzas.']);
        }
    }



}
