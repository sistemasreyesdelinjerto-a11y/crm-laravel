<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BunnyController extends Controller
{
    protected $apiKey;
    protected $storageZone;
    protected $region;
    protected $host;

    public function __construct()
    {
        $this->apiKey = env('BUNNY_API_KEY');
        $this->storageZone = env('BUNNY_STORAGE_ZONE');
        $this->region = env('BUNNY_REGION');
        $this->host = env('BUNNY_HOST');
    }

    // Vista principal
    public function index($lead_id)
    {
        return view('crm.Bunny.index', compact('lead_id'));
    }

    // Subir archivo a la carpeta del paciente
    public function subir(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file',
            'lead_id' => 'required|integer|exists:sa_leads,id'
        ]);

        $file = $request->file('archivo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = "pacientes/{$request->lead_id}/{$fileName}";
        $url = "https://{$this->host}/{$this->storageZone}/{$path}";

        $response = Http::withHeaders([
            'AccessKey' => $this->apiKey,
            'Content-Type' => 'application/octet-stream'
        ])->put($url, file_get_contents($file->getRealPath()));

        if ($response->successful()) {
            return response()->json(['success' => true, 'message' => 'Archivo subido correctamente']);
        }

        return response()->json(['success' => false, 'error' => $response->body()]);
    }

    // Listar archivos del paciente
    public function listar($lead_id)
    {
        $url = "https://{$this->host}/{$this->storageZone}/pacientes/{$lead_id}/";
        $response = Http::withHeaders([
            'AccessKey' => $this->apiKey
        ])->get($url);

        if ($response->successful()) {
            $data = collect($response->json());
            return response()->json($data);
        }

        return response()->json(['success' => false, 'error' => $response->body()]);
    }

    // Mostrar archivo (redirige a la CDN)
    public function mostrar($lead_id, $archivo)
    {
        $url = "https://{$this->region}.cdn.bunnycdn.com/{$this->storageZone}/pacientes/{$lead_id}/{$archivo}";
        return redirect($url);
    }

    // Eliminar archivo
    public function borrar($lead_id, $archivo)
    {
        $url = "https://{$this->host}/{$this->storageZone}/pacientes/{$lead_id}/{$archivo}";

        $response = Http::withHeaders([
            'AccessKey' => $this->apiKey
        ])->delete($url);

        if ($response->successful()) {
            return response()->json(['success' => true, 'message' => 'Archivo eliminado correctamente']);
        }

        return response()->json(['success' => false, 'error' => $response->body()]);
    }
}
