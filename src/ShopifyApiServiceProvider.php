<?php

namespace Arindam\ShopifyApis;

use Illuminate\Support\ServiceProvider;
use Arindam\ShopifyApis\Shopify\ShopifyClass;

class ShopifyApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('shopifyclass', function() {
            return new ShopifyClass();
        });

        //$this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        //$this->loadViewsFrom(__DIR__ . '/resources/views', 'shopifyapis');

        $this->mergeConfigFrom(
            __DIR__ . '/config/shopify-apis.php', 'shopifyapis'
        );

        $this->publishes([
            __DIR__ . '/config/shopify-apis.php' => config_path('shopify-apis.php')
        ], 'shopifyapis:config');

        //php artisan vendor:publish --provider="Arindam\ShopifyApis\ShopifyApiServiceProvider" --force
        //php artisan vendor:publish --tag="shopifyapis:config"
    }
}