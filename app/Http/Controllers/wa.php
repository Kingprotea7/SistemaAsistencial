<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class wa extends Controller
{

    public function notificacion($numero){
        $numero='51 988 395 744';
        $fromPhoneNumberId =183644668163002;
$token='EAAKSqibZBudIBO03QhqG5ZC0wnALy9ObCNPA0jsjIdvKtEZCi19cNyPxrmQZCCHXtWQD5QOuhmyzH6JYIMh9pp41AKhgjEwiaj5ZA3LFZCj0ekTMBm9eH97ZB8H0ZB8EukJjNQiJDNyDDR19J8zDx6sNUXzqL2NZCQCo9ZAaUcw0DRDh1ZAbox4iHcGV41g0eRF';
$telefono=$numero;
$url='https://graph.facebook.com/v17.0/183644668163002/messages';
$version = 'v17.0';

$jsonPayload = [
    "messaging_product" => "whatsapp",
    "preview_url" => false,
    "recipient_type" => "individual",
    "to" => "$numero",
    "type" => "template",
    "template" => [
        "name" => "sistema_asistencial",
        "language" => [
            "code" => "es",
        ]
    ]
];
$response = Http::withToken($token)
->post('https://graph.facebook.com/'.$version.'/'.$fromPhoneNumberId.'/messages', $jsonPayload)
->throw()
->json();
    }
    public function index($numero, $mensaje)
{
    try {
        // Reemplaza estos valores con tus propias credenciales de Twilio
        $fromPhoneNumberId =183644668163002;
        $accessToken = 'EAAKSqibZBudIBO03QhqG5ZC0wnALy9ObCNPA0jsjIdvKtEZCi19cNyPxrmQZCCHXtWQD5QOuhmyzH6JYIMh9pp41AKhgjEwiaj5ZA3LFZCj0ekTMBm9eH97ZB8H0ZB8EukJjNQiJDNyDDR19J8zDx6sNUXzqL2NZCQCo9ZAaUcw0DRDh1ZAbox4iHcGV41g0eRF';
        $version = 'v17.0';

        $jsonPayload = [
            "preview_url" => "false",
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => "$numero" ,
            "type" => "text",
            "text" => [
                // "preview_url" => "false",  // Puedes probar sin esta línea
                "body" => $mensaje,
            ]
        ];

        // Iniciar la sesión cURL
        $response = Http::withToken($accessToken)
            ->post('https://graph.facebook.com/'.$version.'/'.$fromPhoneNumberId.'/messages', $jsonPayload)
            ->throw()
            ->json();

        // Log más detalles sobre la solicitud
        info('Mensaje de WhatsApp enviado:', [
            'numpadre' => $numero,
            'mensaje' => $mensaje,
            'response' => $response
        ]);

        return response()->json(['success' => true, 'data' => $response], 200);
    } catch (Exception $e) {
        // Log más detalles sobre la excepción
        info('Error al enviar mensaje de WhatsApp:', [
            'numpadre' => $numero,
            'mensaje' => $mensaje,
            'error' => $e->getMessage()
        ]);

        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

}
