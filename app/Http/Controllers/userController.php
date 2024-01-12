<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserStatus;

class userController extends Controller
{


    public function showLoginForm()
{
    return view('login.login');
}




     public function mostrarusuarios(){
        $users = User::all();


        return view('login.mostrarusuarios', ['users' => $users]);
     }
     public function ordenar(Request $request)
     {
         // Obtener el parámetro de orden desde la solicitud
         $orderBy = $request->query('order_by', 'id'); // Si no se proporciona, por defecto se ordena por ID

         // Realizar la consulta a la base de datos con la ordenación especificada
         $users = User::orderBy($orderBy)->get();

         // Pasar los datos a la vista
         return view('login.mostrarUsuarios', ['users' => $users]);
     }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Uso de Hash::make
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('login.form')->withErrors(['error' => 'Cuenta creada con éxito ']);

    }


public function submit(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        return redirect()->route('inicio');
    } else {

        // Autenticación fallida
        return redirect()->route('login.form')->withErrors(['error' => 'Credenciales incorrectas :( ']);

    }
}


public function logout()
{

    $user = Auth::user();

    // Marcar al usuario como offline utilizando el modelo UserStatus
    $user->status->markAsOffline();
    UserStatus::where('user_id', $user->id)->update(['is_online' => false]);
    Auth::logout();
    return redirect()->route('login');
}


    public function login(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intento de autenticación
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('inicio');
        } else {
            // Autenticación fallida
            return redirect()->route('login')->withErrors(['error' => 'Credenciales incorrectas']);
        }
    }















}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
