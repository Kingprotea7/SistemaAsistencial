<?php

namespace App\Http\Controllers;

use App\Models\AlumnosModel;
use App\Models\AsistenciaModel;
use App\Models\docenteModel;
use App\Models\SalonesModel;
use Illuminate\Http\Request;

class SalonesController extends Controller
{
   public function index(){
    return view('dashboard.Salones.Salones');
   }
   public function store(Request $request){
    $salon=new SalonesModel;
    $salon->nivel=$request->input('nivel');
    $salon->grade=$request->input('grade');
    $salon->section=$request->input('section');
    $salon->docente_id=$request->input('docente_id');
    $salon->save();
    return back();
   }
   public function create(){
    $docentes = docenteModel::all(); // Consulta para obtener todos los docentes
    return view('dashboard.Salones.crearSalon', ['docentes' => $docentes]);
   }

   public function listar(){
    $salones = SalonesModel::where('grade', '1')
    ->where('nivel', 'primaria')
    ->orderBy('section', 'asc')->with('docente')->get();

    return view('dashboard.Salones.listarPrimaria',['salones'=>$salones]);
   }
   public function listarS(){
    return view('dashboard.Salones.listarSecundaria');
   }
   public function listarS1(Request $request){
    $grade = $request->input('grade'); // Obtiene el valor del parámetro 'grade' desde la URL
    $salones = SalonesModel::where('nivel', 'primaria')
        ->where('grade', $grade) // Filtras por grado, no por nivel
        ->orderBy('section', 'asc')
        ->with('docente')
        ->get();

    return view('dashboard.Salones.iteracion1ero', ['salones' => $salones]);
}

public function listarS2(Request $request){
    $grade = $request->input('grade'); // Obtiene el valor del parámetro 'grade' desde la URL
    $salones = SalonesModel::where('nivel', 'secundaria')
        ->where('grade', $grade) // Filtras por grado, no por nivel
        ->orderBy('section', 'asc')
        ->with('docente')
        ->get();

    return view('dashboard.Salones.iteracionesSecundaria.iteracion1ero', ['salones' => $salones]);
}

public function ver(SalonesModel $salon)
{
    return view('dashboard.Salones.ver', ['salon' => $salon]);
}

public function editar(SalonesModel $salon)
{
    $docentes = docenteModel::all();
    return view('dashboard.Salones.editar', ['salon' => $salon,'docentes' => $docentes]);
}
public function store1(Request $request, $id){
    $salonId = $request->input('salon_id'); // Obtén el id del salón desde el formulario

    // Ahora puedes buscar el salón utilizando el $id y actualizarlo
    $salon = SalonesModel::find($salonId);
    $salon->docente_id = $request->input('docente_id');
    $salon->save();

    return back();
}

public function asistencias()
{
    return $this->hasMany(AsistenciaModel::class, 'salon_id');
}

public function borrar($id) {
   $salon=SalonesModel::find($id);
    if ($salon) {
        $salon->delete();
        session()->flash('success', 'Salón borrado exitosamente.');
    }


    return back();

}

public function listarAlumnosDelSalon($id) {
    // Obtiene el salón por su ID
    $salon = SalonesModel::findOrFail($id);

    // Obtiene los alumnos relacionados con el salón a través de la relación definida
    $alumnosEnSalon = $salon->alumnos;

    return view('dashboard.Salones.iteracionesPrimaria.listado.listado', ['alumnos' => $alumnosEnSalon, 'salon' => $salon]);
}
public function mostrarDetalles($salonId) {
    $totalAsistencias = AsistenciaModel::where('salon_id', $salonId)
        ->where('estado', 'asistencia')
        ->count();

    return view('detalles_salon', ['totalAsistencias' => $totalAsistencias]);
}



}
