<?php

namespace DevArk\Sdk\ECommerce\Domain;

use DevArk\Sdk\ECommerce\Support\ECommerceSdkClient;

class ECommerceClientService
{
    public function __construct(
        private ECommerceSdkClient $eCommerceSdkClient
    ) {
    }

    public function apiCall(string $url, array $params = [])
    {
        return $this->eCommerceSdkClient->apiCall($url, $params);
    }
}
