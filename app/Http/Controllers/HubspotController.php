<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HubspotController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'interesado' => 'required|string',
        ]);

        $client = new Client();
        $apiKey = env('HUBSPOT_API_KEY');

        $data = [
            "properties" => [
                ["property" => "firstname", "value" => $request->nombre],
                ["property" => "lastname", "value" => $request->apellido],
                ["property" => "phone", "value" => $request->telefono],
                ["property" => "interesado", "value" => $request->interesado],
                ["property" => "otro_interes", "value" => $request->otro_interes ?? ''],
                ["property" => "fecha_estimada", "value" => $request->fecha_estimada ?? ''],
            ]
        ];

        try {
            $client->post("https://api.hubapi.com/crm/v3/objects/contacts?hapikey={$apiKey}", [
                'json' => $data
            ]);

            return redirect()->back()->with('success', 'Formulario enviado correctamente!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al enviar: ' . $e->getMessage());
        }
    }
}
