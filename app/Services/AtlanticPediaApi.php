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

    /**
     * Create a withdrawal/transfer to bank or e-wallet via AtlanticH2H
     * @param string $refId Unique reference from your system
     * @param string $kodeBank Bank code from bank list
     * @param string $nomorAkun Destination account number
     * @param string $namaPemilik Destination account holder name
     * @param int $nominal Amount to transfer
     * @param string|null $email Recipient email (optional)
     * @param string|null $phone Recipient phone (optional)
     * @param string|null $note Transfer note (optional)
     * @return array API response
     */
 public function createTransfer($refId, $kodeBank, $nomorAkun, $namaPemilik, $nominal, $email = null, $phone = null, $note = null)
{
    $params = [
        'api_key' => $this->apiKey,
        'ref_id' => $refId,
        'kode_bank' => $kodeBank,
        'nomor_akun' => $nomorAkun,
        'nama_pemilik' => $namaPemilik,
        'nominal' => (int) $nominal,
    ];

    if ($email) $params['email'] = $email;
    if ($phone) $params['phone'] = $phone;
    if ($note) $params['note'] = $note;

    $response = Http::asForm()->post($this->baseUrl . '/transfer/create', $params);

    return $response->json() ?? [
        'status' => false,
        'message' => 'API error',
        'raw' => $response->body(),
    ];
}





    public function getBankList()
    {
        $params = [
            'api_key' => $this->apiKey,
        ];
        $response = Http::asForm()->post($this->baseUrl . '/transfer/bank_list', $params);
        if ($response->successful()) {
            return $response->json();
        }
        return [
            'status' => false,
            'message' => 'Gagal mengambil daftar bank/ewallet.',
            'data' => []
        ];
    }
}
