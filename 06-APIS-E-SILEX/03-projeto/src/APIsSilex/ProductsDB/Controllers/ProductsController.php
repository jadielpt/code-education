<?php

namespace APIsSilex\ProductsDB\Controllers;

use Silex\Application;

use APIsSilex\ProductsDB\Interfaces\ProductsControllerInterface;
use APIsSilex\ProductsDB\Service\ProductsService;
use APIsSilex\ProductsDB\Entity\Products;
use APIsSilex\ProductsDB\Mapper\ProductsMapper;

class ProductsController implements ProductsControllerInterface
{
    public function connect(Application $app) 
    {
        $products = $app['controllers_factory'];
            
        $products->get('/', function() use ($app){
            return $app['twig']->render('content.twig', ['products' => self::getProducts($app)]);
        });

        $products->get('/{id}', function($id) use ($app){
            return $app['twig']->render('produts.twig', ['products' => self::getProductsId($app, $id)]);
        });

        $products->get('/{id}', function($id) use ($app){
            return $app['twig']->render('update.twig', ['products' => self::getProductsId($app, $id)]);
        })->bind('update');

        return $products;
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

        $result = $app['productsService']->fetchAll($data);

        return $result;
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

        $result = $app['productsService']->fetchAll($data);


        if(!isset($result[$id])){
            $app->abort(404, "Product {$id} not found.");
        }
        return $result[$id-1];
    }
}
