<?php

namespace DevArk\Sdk\ECommerce\Domain\Services\Product;

use DevArk\Sdk\ECommerce\Domain\ECommerceClientService;

class ProductService
{
    public function __construct(
        private ECommerceClientService $darkCoreClientService
    ) {
    }

    public function getProducts(): array
    {
        $url = "/api/product";
        return $this->darkCoreClientService->apiCall($url, [false]);
    }

    public function getProductById($identifier)
    {
        $url = "/api/products/{$identifier}";
        return $this->darkCoreClientService->apiCall($url, [false]);
    }

    public function createProduct($product)
    {
        $url = "/api/products";
        return $this->darkCoreClientService->apiCall($url, $product);
    }

    public function updateProduct($product)
    {
        $url = "/api/products/{$product['id']}";
        return $this->darkCoreClientService->apiCall($url, $product);
    }

    public function deleteProduct($identifier)
    {
        $url = "/api/products/{$identifier}";
        return $this->darkCoreClientService->apiCall($url, [false]);
    }
}
