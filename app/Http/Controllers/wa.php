<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class wa extends Controller
{
    public function index()
    {


// Ambas líneas hacen que $numero sea una cadena que representa el valor de $numeropadre.


try{
          // Reemplaza estos valores con tus propias credenciales de Twilio
          $fromPhoneNumberId = '183644668163002';
          $accessToken = 'EAAKSqibZBudIBO03QhqG5ZC0wnALy9ObCNPA0jsjIdvKtEZCi19cNyPxrmQZCCHXtWQD5QOuhmyzH6JYIMh9pp41AKhgjEwiaj5ZA3LFZCj0ekTMBm9eH97ZB8H0ZB8EukJjNQiJDNyDDR19J8zDx6sNUXzqL2NZCQCo9ZAaUcw0DRDh1ZAbox4iHcGV41g0eRF';
  $version='v17.0';
  $jsonPayload = [
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => "+51 982 185 930",
    "type" => "text",
    "text" => [

        "body" => "Hola",
    ],
    "language" =>[
        "code"=> "en_US"]  // Cambiado de "languaje" a "language"
];


// Iniciar la sesión cURL
$response = Http::withToken($accessToken)
    ->post('https://graph.facebook.com/'.$version.'/'.$fromPhoneNumberId.'/messages', $jsonPayload)->throw()->json();

return response()->json(['success' => true, 'data' => $response],200);
      }
catch(exception $e){
return   response ()->json(['success'=>false,'error'=>$e->getMessage()]
,500);
}
    }
}
