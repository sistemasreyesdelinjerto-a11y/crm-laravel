<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HubSpotService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = "https://api.hubapi.com";
        $this->token = env('HUBSPOT_API_KEY');
    }

    public function getContacts($limit = 50)
    {           
        return $this->fetch("/crm/v3/objects/contacts?limit={$limit}");
    }

    public function getDeals($limit = 50)
    {
        return $this->fetch("/crm/v3/objects/deals?limit={$limit}");
    }

    public function getCompanies($limit = 50)
    {
        return $this->fetch("/crm/v3/objects/companies?limit={$limit}");
    }

    private function fetch($endpoint)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ])->get($this->baseUrl . $endpoint);

        return $response->successful() ? $response->json()['results'] ?? [] : [];
    }
}
