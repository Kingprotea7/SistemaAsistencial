<?php

namespace App\Http\Controllers;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Models\User;
class UsuariosEnLineaController extends Controller
{
    public function index()
    {
        $usuariosEnLineaIds = UserStatus::where('is_online', true)->pluck('user_id');
        $usuariosEnLinea = User::whereIn('id', $usuariosEnLineaIds)->get();

        return view('dashboard.dashboard', compact('usuariosEnLinea'));
    }

}
