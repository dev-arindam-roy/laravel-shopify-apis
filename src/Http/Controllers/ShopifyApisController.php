<?php

namespace Arindam\ShopifyApis\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Arindam\ShopifyApis\Traits\ShopifyApis;

class ShopifyApisController extends Controller
{
    use ShopifyApis;

    protected $shopifyApisConfigData;
    protected $apiVersion;
    protected $apiStore;
    protected $apiKey;

    public function __construct()
    {
        $this->shopifyApisConfigData = array();
        $publishedConfigFilePath = config_path('shopify-apis.php');
        if (file_exists($publishedConfigFilePath)) {
            $this->shopifyApisConfigData = config('shopify-apis');
        }
        $this->apiVersion = !empty(env('SHOPIFY_API_VERSION')) ? env('SHOPIFY_API_VERSION') : '2023-10';
        $this->apiStore = !empty(env('SHOPIFY_STORE_URL')) ? env('SHOPIFY_STORE_URL') : null;
        $this->apiKey = !empty(env('SHOPIFY_ACCESS_TOKEN')) ? env('SHOPIFY_ACCESS_TOKEN') : null;
    }

    public function baseUrl()
    {
        $baseURL = null;
        if (empty($this->apiStore)) {
            return array('status' => 'error', 'message' => 'Shopify store url not found in the .env file');
        }
        if (empty($this->apiKey)) {
            return array('status' => 'error', 'message' => 'Shopify api access token not found in the .env file');
        }
        $baseURL = $this->apiStore . '/admin/api/' . $this->apiVersion;
        return array('status' => 'success', 'message' => $baseURL);
    }

    public function getAllProducts()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allProducts($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllActiveProducts()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allActiveProducts($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllDraftProducts()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allDraftProducts($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllArchivedProducts()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allArchivedProducts($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllPublishedProducts()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allPublishedProducts($this->baseUrl()['message'], $this->apiKey);
    }

    public function getProductByIds($ids)
    {
        if (empty($ids)) {
            return array('status' => 'error', 'message' => 'Array of product ids need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::productByIds($this->baseUrl()['message'], $this->apiKey, $ids);
    }

    public function getSpecificProductById($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Product id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::specificProductById($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getAllProductCount()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allProductCount($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllActiveProductCount()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allActiveProductCount($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllDraftProductCount()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allDraftProductCount($this->baseUrl()['message'], $this->apiKey);
    }

    /** Product Collection */

    public function getAllCollections()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allCollections($this->baseUrl()['message'], $this->apiKey);
    }

    public function getSpecificCollection($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Collection id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::specificCollection($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getAllCollectionCount()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allCollectionCount($this->baseUrl()['message'], $this->apiKey);
    }

    public function getCollectionInfoById($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Collection id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::collectionInfoById($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getProductsOfCollection($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Collection id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::productsOfCollection($this->baseUrl()['message'], $this->apiKey, $id);
    }

    /** Product Images */

    public function getProductImages($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Product id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::productImages($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getProductImagesCount($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Product id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::productImagesCount($this->baseUrl()['message'], $this->apiKey, $id);
    }

    /** Product Variants */

    public function getAllProductVariants($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Product id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allProductVariants($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getVariantInfo($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Variant id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::variantInfo($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getProductVariantCount($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Product id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::productVariantCount($this->baseUrl()['message'], $this->apiKey, $id);
    }

    /** Orders */

    public function getAllOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllOpenOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allOpenOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllClosedOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allClosedOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllCancelledOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allCancelledOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllAuthorizedOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allAuthorizedOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllPendingOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allPendingOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllPaidOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allPaidOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllUnPaidOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allUnPaidOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllPartialPaidOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allPartialPaidOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllRefundOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allRefundOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllPartiallyRefundOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allPartiallyRefundOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getAllVoidOrders()
    {
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::allVoidOrders($this->baseUrl()['message'], $this->apiKey);
    }

    public function getSpecificOrder($id)
    {
        if (empty($id)) {
            return array('status' => 'error', 'message' => 'Order id need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::specificOrder($this->baseUrl()['message'], $this->apiKey, $id);
    }

    public function getOrdersByIds($ids)
    {
        if (empty($ids)) {
            return array('status' => 'error', 'message' => 'Array of order ids need to be pass');
        }
        return ($this->baseUrl()['status'] == 'error') ? $this->baseUrl() : self::ordersByIds($this->baseUrl()['message'], $this->apiKey, $ids);
    }
}
