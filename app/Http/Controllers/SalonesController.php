<?php

namespace App\Http\Controllers;

use App\Models\SalonesModel;
use Illuminate\Http\Request;

class SalonesController extends Controller
{
   public function index(){
    return view('dashboard.Salones.Salones');
   }
   public function store(Request $request){
    $salon=new SalonesModel;
    $salon->name=$request->input('name');
    $salon->grade=$request->input('grade');
    $salon->section=$request->input('section');
    $salon->save();

   }    
   public function create(){
    return view('dashboard.Salones.crearSalon');
   }
}
