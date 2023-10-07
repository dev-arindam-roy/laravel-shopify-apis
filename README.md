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

## Now enjoy with the below methods:

> **Products APIs**

```php

1.  ShopifyApis::allProducts();
2.  ShopifyApis::allActiveProducts();
3.  ShopifyApis::allDraftProducts();
4.  ShopifyApis::allArchivedProducts();
5.  ShopifyApis::allPublishedProducts();
6.  ShopifyApis::productByIds($productIds); // pass an array of product ids, ex: ['xxx', 'xxx']
7.  ShopifyApis::specificProductById($productId); // pass specific product id as param
8.  ShopifyApis::allActiveProductCount();
9.  ShopifyApis::allDraftProductCount();
10. ShopifyApis::allProducts();
11. ShopifyApis::productImages($productId); // pass specific product id as param
12. ShopifyApis::productImagesCount($productId); // pass specific product id as param

```

> **Product Collection APIs**

```php

1.  ShopifyApis::allCollections();
2.  ShopifyApis::specificCollection($collectionId); // pass specific collection id as param
3.  ShopifyApis::allCollectionCount();
4.  ShopifyApis::collectionInfoById($collectionId); // pass specific collection id as param
5.  ShopifyApis::productsOfCollection($collectionId); // pass specific collection id as param

```

> **Product Variants APIs**

```php

1.  ShopifyApis::allProductVariants($productId); // pass specific product id as param
2.  ShopifyApis::variantInfo($variantId); // pass specific variant id as param
3.  ShopifyApis::productVariantCount($productId); // pass specific product id as param

```

> **Orders APIs**

```php

1.  ShopifyApis::allOrders();
2.  ShopifyApis::allOpenOrders();
3.  ShopifyApis::allClosedOrders();
4.  ShopifyApis::allCancelledOrders();
5.  ShopifyApis::allAuthorizedOrders();
6.  ShopifyApis::allPendingOrders();
7.  ShopifyApis::allPaidOrders();
8.  ShopifyApis::allUnPaidOrders();
9.  ShopifyApis::allPartialPaidOrders();
10.  ShopifyApis::allRefundOrders();
11.  ShopifyApis::allPartiallyRefundOrders();
12.  ShopifyApis::allVoidOrders();
13.  ShopifyApis::specificOrder($orderId); // pass specific order id as param
14.  ShopifyApis::ordersByIds($orderIds); // pass an array of order ids, ex: ['xxx', 'xxx']

```

## license:
The MIT License (MIT). Please see [License File](https://github.com/dev-arindam-roy/laravel-shopify-apis/blob/master/LICENSE) for more information.

## Post Issues: if found any
If have any issue please [write me](https://github.com/dev-arindam-roy/laravel-shopify-apis/issues).
