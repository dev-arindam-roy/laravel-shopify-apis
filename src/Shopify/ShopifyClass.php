<?php
  
namespace Arindam\ShopifyApis\Shopify;
use Arindam\ShopifyApis\Http\Controllers\ShopifyApisController;
  
class ShopifyClass 
{
    protected $shopifyApisController;

    public function __construct()
    {
        $this->shopifyApisController = new ShopifyApisController();
    }

    public function hey()
    {
        return 'Hello Arindam, Shopify APIs has been ready for you !!';
    }

    public function baseApiUrl()
    {
        return $this->shopifyApisController->baseUrl();
    }

    public function allProducts()
    {
        return $this->shopifyApisController->getAllProducts();
    }

    public function allActiveProducts()
    {
        return $this->shopifyApisController->getAllActiveProducts();
    }

    public function allDraftProducts()
    {
        return $this->shopifyApisController->getAllDraftProducts();
    }

    public function allArchivedProducts()
    {
        return $this->shopifyApisController->getAllArchivedProducts();
    }

    public function allPublishedProducts()
    {
        return $this->shopifyApisController->getAllPublishedProducts();
    }

    public function productByIds($productIds = array())
    {
        return $this->shopifyApisController->getProductByIds($productIds);
    }

    public function specificProductById($productId = null)
    {
        return $this->shopifyApisController->getSpecificProductById($productId);
    }

    public function allProductCount()
    {
        return $this->shopifyApisController->getAllProductCount();
    }

    public function allActiveProductCount()
    {
        return $this->shopifyApisController->getAllActiveProductCount();
    }

    public function allDraftProductCount()
    {
        return $this->shopifyApisController->getAllDraftProductCount();
    }

    /** Product Collection */

    public function allCollections()
    {
        return $this->shopifyApisController->getAllCollections();
    }

    public function specificCollection($collectionId = null)
    {
        return $this->shopifyApisController->getSpecificCollection($collectionId);
    }

    public function allCollectionCount()
    {
        return $this->shopifyApisController->getAllCollectionCount();
    }

    public function collectionInfoById($collectionId = null)
    {
        return $this->shopifyApisController->getCollectionInfoById($collectionId);
    }

    public function productsOfCollection($collectionId = null)
    {
        return $this->shopifyApisController->getProductsOfCollection($collectionId);
    }

    /** Product Images */

    public function productImages($productId = null)
    {
        return $this->shopifyApisController->getProductImages($productId);
    }

    public function productImagesCount($productId = null)
    {
        return $this->shopifyApisController->getProductImagesCount($productId);
    }

    /** Product Variants */

    public function allProductVariants($productId = null)
    {
        return $this->shopifyApisController->getAllProductVariants($productId);
    }

    public function variantInfo($variantId = null)
    {
        return $this->shopifyApisController->getVariantInfo($variantId);
    }

    public function productVariantCount($productId = null)
    {
        return $this->shopifyApisController->getProductVariantCount($productId);
    }

    /** Orders */

    public function allOrders()
    {
        return $this->shopifyApisController->getAllOrders();
    }

    public function allOpenOrders()
    {
        return $this->shopifyApisController->getAllOpenOrders();
    }

    public function allClosedOrders()
    {
        return $this->shopifyApisController->getAllClosedOrders();
    }

    public function allCancelledOrders()
    {
        return $this->shopifyApisController->getAllCancelledOrders();
    }

    public function allAuthorizedOrders()
    {
        return $this->shopifyApisController->getAllAuthorizedOrders();
    }

    public function allPendingOrders()
    {
        return $this->shopifyApisController->getAllPendingOrders();
    }

    public function allPaidOrders()
    {
        return $this->shopifyApisController->getAllPaidOrders();
    }

    public function allUnPaidOrders()
    {
        return $this->shopifyApisController->getAllUnPaidOrders();
    }

    public function allPartialPaidOrders()
    {
        return $this->shopifyApisController->getAllPartialPaidOrders();
    }

    public function allRefundOrders()
    {
        return $this->shopifyApisController->getAllRefundOrders();
    }

    public function allPartiallyRefundOrders()
    {
        return $this->shopifyApisController->getAllPartiallyRefundOrders();
    }

    public function allVoidOrders()
    {
        return $this->shopifyApisController->getAllVoidOrders();
    }

    public function specificOrder($orderId = null)
    {
        return $this->shopifyApisController->getSpecificOrder($orderId);
    }

    public function ordersByIds($orderIds = array())
    {
        return $this->shopifyApisController->getOrdersByIds($orderIds);
    }
}