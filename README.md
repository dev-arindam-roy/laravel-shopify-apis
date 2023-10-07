# LARAVEL SHOPIFY API

### A laravel package to integrate all shopify apis

## Installation

> **No dependency on PHP version and LARAVEL version**

### STEP 1: Run the composer command:

```shell
composer require arindam/shopify-apis
```

### STEP 2: Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Arindam\ShopifyApis\ShopifyApiServiceProvider::class,
```

You need to use the below facade, add this to aliases section in config/app.php:

```php
'ShopifyApis' => Arindam\ShopifyApis\Shopify\ShopifyClassFacade::class,
```

### STEP 3: (Optional) Publish the package config:

If you need to customize the api configuration

```php
php artisan vendor:publish --provider="Arindam\ShopifyApis\ShopifyApiServiceProvider" --force

- OR -

php artisan vendor:publish --tag="shopifyapis:config"
```

## How to use?:

First, you need to create an app in your shopify admin section and you will get the access token.
Then, you need to just add below information in your .env file  

```php

SHOPIFY_STORE_URL=https://{your-store-name}.myshopify.com
SHOPIFY_ACCESS_TOKEN={YOUR_APP_ACCESS_TOKEN}

```

## license:
The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Post Issues: if found any
If have any issue please [write me](https://github.com/dev-arindam-roy/onex-sysinfo/issues).
