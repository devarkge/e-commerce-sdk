<?php
namespace DevArk\Sdk\ECommerce;

use DevArk\Sdk\ECommerce\Domain\Services\Product\ProductService;
use DevArk\Sdk\ECommerce\Support\ECommerceSdkClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;


class EcommerceSdkServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/devark-ecommerce.php' => config_path('devark-ecommerce.php'),
        ], 'dark');
        Auth::provider('devark-ecommerce', function ($app, $config) {
            return $app->make(ProductService::class, [
                'config' => $config,
            ]);
        });
    }

    public function register(): void
    {
        $this->app->singleton(
            ECommerceSdkClient::class,
            function() {
                return new ECommerceSdkClient();
            }
        );
        $this->app->alias(ECommerceSdkClient::class, 'devark-ecommerce');
    }
}
