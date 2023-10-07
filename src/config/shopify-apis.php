<?php

return [

    /**
     * If you want to disable the route for the system information view page
     * 
     * available options: true, false
     * 
     * default: true
     */

    'is_route_enabled' => true, 
    
    
    /**
     * If you want to change the route prefix
     * 
     * default: arindam
     */
    'route_prefix' => 'arindam',
    

    /**
     * If you want to change the route name
     * 
     * default: check-shopify-apis
     */
    'route_name' => 'check-shopify-apis',


    /**
     * If you want to add any middleware (s) to restrict the access
     * 
     * default: web
     */
    'route_middleware' => ['web'],


    /**
     * Shopify admin/development store url
     * 
     * example: https://your-store-name.myshopify.com
     */
    'store_url' => env('SHOPIFY_STORE_URL'),

    /**
     * Shopify api access token
     * 
     */
    'access_token' => env('SHOPIFY_ACCESS_TOKEN'),

    /**
     * Shopify admin api version 
     * 
     * default: 2023-10
     */
    'api_version' => env('SHOPIFY_API_VERSION', '2023-10'),
];