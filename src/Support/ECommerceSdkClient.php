<?php

namespace DevArk\Sdk\ECommerce\Support;

use GuzzleHttp\Client;
use DevArk\Sdk\ECommerce\Support\Exceptions\DarkCoreException;

class ECommerceSdkClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . config('devark-ecommerce.api_key'),
                ],
                'base_uri' => config('devark-ecommerce.api_base'),
            ]
        );
    }

    /**
     * @throws DarkCoreException
     */
    public function apiCall(string $url, array $options = [], string $method = 'post')
    {
        try {
            $params = [
                'form_params' => $options,
            ];
            $response = $this->client->$method($url, $params);
            $body = json_decode($response->getBody()->getContents(), true);
            return $body['data'];
        } catch(\Throwable $e) {
            throw new DarkCoreException($e->getMessage(), $e->getCode());
        }
    }
}
