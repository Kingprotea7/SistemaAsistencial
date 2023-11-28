<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductoModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userModel;
class AppsTrabajoController extends Controller
{

    protected $model;
    protected $format = 'json';

    public function __construct(userController $userModel)
    {
        $this->model = $userModel;  
    }

    public function index()
    {
        $users = User::all();
        return $users;
        // return $this->genericResponse($this->model->productos_disponibles(), "", 200);
    }

    private function respond($data)
    {
        return response()->json([
            "data" => $data,
            "code" => 200
        ]);
    }

    // You can modify this function based on your needs
    private function genericResponse($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond($data);
        } else {
            return response()->json([
                "msj" => $msj,
                "code" => $code
            ]);
        }
    }
}


