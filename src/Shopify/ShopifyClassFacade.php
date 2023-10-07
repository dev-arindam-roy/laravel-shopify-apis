<?php
  
namespace Arindam\ShopifyApis\Shopify;
use Illuminate\Support\Facades\Facade;
  
class ShopifyClassFacade extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return 'shopifyclass'; 
    }
}