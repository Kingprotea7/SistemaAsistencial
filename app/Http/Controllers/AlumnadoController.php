<?php

namespace App\Http\Controllers;

use App\Models\AlumnosModel;
use App\Models\SalonesModel;
use Illuminate\Http\Request;

class AlumnadoController extends Controller
{
   public function index(Request $request){
        $ruta = $request->path();
            return view('dashboard.Alumnado.Alumnado');

   }
   public function create(){
return view('dashboard.Alumnado.crearAlumno');
   }
   public function edit(){
    return view('dashboard.Alumnado.Alumnado');
   }

   public function delete(){
    return view('dashboard.Alumnado.Alumnado');
   }
public function store(Request $request){

    $request->validate([
        'nombre' => 'required',
        'ap_paterno' => 'required',
        'ap_materno' => 'required',
        'num_padre' => 'required',
        'nivel' => 'required',
        'grade' => 'required',
        'section' => 'required',
    ]);
    $numeroAleatorio = uniqid();

    $salon = SalonesModel::where('grade', $request->input('grade'))
    ->where('section', $request->input('section'))
    ->first();
    if ($salon) {
        // Si se encontró el salón, puedes asignar su ID al alumno
        $alumno = new AlumnosModel;
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido_paterno = $request->input('ap_paterno');
        $alumno->apellido_materno = $request->input('ap_materno');
        $alumno->num_padre = $request->input('num_padre');
        $alumno->nivel = $request->input('nivel');
        $alumno->grado = $request->input('grade');
        $alumno->seccion = $request->input('section');
        $alumno->numero_aleatorio = $numeroAleatorio;
        $alumno->salon_id = $salon->id; // Asigna el ID del salón al alumno
        $alumno->save();

        return redirect()->route('Alumnado.index');
    } else {
        // Maneja el caso en el que no se encuentra el salón
        // Puedes mostrar un mensaje de error o redirigir a una página de error
        return back()->with('error', 'El salón no se encontró.');
    }
}



public function buscarAlumnos(Request $request) {
    // Procesa la búsqueda y obtén los resultados
    $query = $request->input('query');
    $resultados = [];

    if (!empty($query)) {
        $resultados = AlumnosModel::where('nombre', 'like', '%' . $query . '%')
            ->orWhere('apellido_paterno', 'like', '%' . $query . '%')
            ->orWhere('apellido_materno', 'like', '%' . $query . '%')
            ->orWhere('num_padre', 'like', '%' . $query . '%')
            ->get();
    }

    return view('dashboard.Alumnado.Alumnado', ['alumnos' => $resultados]);
}

public function salon() {
    return $this->belongsTo(SalonesModel::class, 'salon_id');
}






}
