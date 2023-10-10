<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnadoController extends Controller
{
   public function index(Request $request){
        $ruta = $request->path();
            return view('dashboard.Alumnado.Alumnado');

   }
   public function create(){
return view('dashboard.Alumnado.Alumnado');
   }
   public function edit(){
    return view('dashboard.Alumnado.Alumnado');
   }

   public function delete(){
    return view('dashboard.Alumnado.Alumnado');
   }

}
