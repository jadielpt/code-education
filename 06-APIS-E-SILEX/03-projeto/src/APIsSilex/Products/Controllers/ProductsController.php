<?php

namespace APIsSilex\Products\Controllers;

use Silex\Application;

use APIsSilex\Products\Interfaces\ProductsControllerInterface;
use APIsSilex\Products\Service\ProductsService;
use APIsSilex\Products\Entity\Products;
use APIsSilex\Products\Mapper\ProductsMapper;

class ProductsController implements ProductsControllerInterface
{
    public function connect(Application $app) 
    {
        $products = $app['controllers_factory'];
        
            
        $products->get('/', function() use ($app){
            return self::getProducts($app);
        });

        $products->get('/{product}', function($product) use ($app){
            return self::getProductsId($app, $product);
        });
  
        return $products;
    }
    
    public function productsSevice(Application $app)
    {
        
    }
    
    public function getProducts(Application $app) 
    {
        $app['productsService'] = function() {
            $products = new Products();
            $productsMapper = new ProductsMapper();
            $productsService = new ProductsService($products, $productsMapper);
            
            return $productsService;
        };
        
        $data['name'] = null;
        $data['description'] = null;
        $data['value'] = null;

        $result = $app['productsService']->insert($data);

        return $app->json($result);
    }
    
    public function getProductsId(Application $app, $id) 
    {
        $app['productsService'] = function() {
            $products = new Products();
            $productsMapper = new ProductsMapper();
            $productsService = new ProductsService($products, $productsMapper);
            
            return $productsService;
        };
        
        $data['name'] = null;
        $data['description'] = null;
        $data['value'] = null;

        $result = $app['productsService']->insert($data);

        if(!isset($result[$id])){
            $app->abort(404, "Product {$id} not found.");
        }
        return $app->json($result[$id]);
    }
}
