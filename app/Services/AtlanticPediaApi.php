<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AtlanticPediaApi
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.atlanticpedia.api_key');
        $this->baseUrl = rtrim(config('services.atlanticpedia.base_url', 'https://atlantich2h.com/'), '/');
    }

    public function getDepositMethods($type = null)
    {
        $params = [
            'api_key' => $this->apiKey,
        ];
        if ($type) {
            $params['type'] = $type;
        }
        $response = Http::asForm()->post($this->baseUrl . '/deposit/metode', $params);
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    public function createDeposit($reffId, $nominal, $type, $metode)
    {
        $params = [
            'api_key' => $this->apiKey,
            'reff_id' => $reffId,
            'nominal' => $nominal,
            'type' => $type,
            'metode' => $metode,
        ];
        $response = Http::asForm()->post($this->baseUrl . '/deposit/create', $params);
        if ($response->successful()) {
            return $response->json();
        }
        return [
            'status' => false,
            'message' => 'Gagal menghubungi API pembayaran.'
        ];
    }

    public function cancelDeposit($depositId)
    {
        $params = [
            'api_key' => $this->apiKey,
            'id' => $depositId,
        ];
        $response = Http::asForm()->post($this->baseUrl . '/deposit/cancel', $params);
        if ($response->successful()) {
            return $response->json();
        }
        return [
            'status' => false,
            'message' => 'Gagal membatalkan deposit.'
        ];
    }

    public function getDepositStatus($depositId)
    {
        $params = [
            'api_key' => $this->apiKey,
            'id' => $depositId,
        ];
        $response = Http::asForm()->post($this->baseUrl . '/deposit/status', $params);
        if ($response->successful()) {
            return $response->json();
        }
        return [
            'status' => false,
            'message' => 'Gagal mengambil status deposit.'
        ];
    }
}
