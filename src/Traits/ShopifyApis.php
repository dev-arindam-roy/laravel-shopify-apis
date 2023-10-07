<?php

namespace Arindam\ShopifyApis\Traits;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

trait ShopifyApis {

    public static function allProducts($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/products.json?limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allActiveProducts($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/products.json?limit=' . $limit . '&status=active';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allDraftProducts($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/products.json?limit=' . $limit . '&status=draft';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allArchivedProducts($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/products.json?limit=' . $limit . '&status=archived';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allPublishedProducts($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/products.json?limit=' . $limit . '&published_status=published';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function productByIds($baseUrl, $accessToken, $ids, $limit = 100)
    {
        $apiURL = $baseUrl . '/products.json?limit=' . $limit . '&ids=' . implode(',', $ids);
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function specificProductById($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/products/' . $id . '.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allProductCount($baseUrl, $accessToken)
    {
        $apiURL = $baseUrl . '/products/count.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allActiveProductCount($baseUrl, $accessToken)
    {
        $apiURL = $baseUrl . '/products/count.json?published_status=published';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allDraftProductCount($baseUrl, $accessToken)
    {
        $apiURL = $baseUrl . '/products/count.json?published_status=unpublished';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    /** Product Collection */

    public static function allCollections($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/collects.json?limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function specificCollection($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/collects/' . $id . '.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allCollectionCount($baseUrl, $accessToken)
    {
        $apiURL = $baseUrl . '/collects/count.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function collectionInfoById($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/collections/' . $id . '.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function productsOfCollection($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/collections/' . $id . '/products.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    /** Product Images */

    public static function productImages($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/products/' . $id . '/images.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function productImagesCount($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/products/' . $id . '/images/count.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    /** Product Variants */

    public static function allProductVariants($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/products/' . $id . '/variants.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function variantInfo($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/variants/' . $id . '.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function productVariantCount($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/products/' . $id . '/variants/count.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    /** Orders */

    public static function allOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?status=any&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allOpenOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?status=open&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allClosedOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?status=closed&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allCancelledOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?status=cancelled&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allAuthorizedOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=authorized&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allPendingOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=pending&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allPaidOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=paid&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allUnPaidOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=unpaid&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allPartialPaidOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=partially_paid&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allRefundOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=refunded&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allPartiallyRefundOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=partially_refunded&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function allVoidOrders($baseUrl, $accessToken, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?financial_status=voided&limit=' . $limit;
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function specificOrder($baseUrl, $accessToken, $id)
    {
        $apiURL = $baseUrl . '/orders/' . $id . '.json';
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function ordersByIds($baseUrl, $accessToken, $ids, $limit = 100)
    {
        $apiURL = $baseUrl . '/orders.json?&limit=' . $limit . '&ids=' . implode(',', $ids);
        $headers = array('X-Shopify-Access-Token: ' . $accessToken);
        return self::executeAPI($apiURL, $headers);
    }

    public static function executeAPI($url = '', $header = array(), $method = 'GET')
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            $result = json_decode($result, true);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}