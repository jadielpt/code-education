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

        $products->get('/produto/{id}', function($id) use ($app){
            return $app['twig']->render('produts.twig', ['products' => self::getProductsId($app, $id)]);
        })->bind("produto");

        $products->get('/alterar/produto/{id}', function($id) use ($app){
            return $app['twig']->render('update.twig', ['products' => self::getUpdate($app, $id)]);
        })->bind('update');

        $products->get('/', function($id) use ($app){
            return $app['twig']->render('content.twig', ['products' => self::getDelete($app, $id)]);
        })->bind('delete');

        $products->get('/inserir', function() use ($app){
            return $app['twig']->render('insert.twig', []);
        })->bind('insert');


        return $products;
    }

    public function getInsert(Application $app)
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

        return $app['productsService']->insert($data);

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

    public function getUpdate(Application $app, $id)
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

        $result = $app['productsService']->update($data);
        if(!isset($result[$id])){
            $app->abort(404, "Product {$id} not found.");
        }
        return $result[$id-1];
    }

    public function getDelete(Application $app, $id)
    {
        $app['productsService'] = function() {
            $products = new Products();
            $productsMapper = new ProductsMapper();
            $productsService = new ProductsService($products, $productsMapper);

            return $productsService;
        };
        $data['id'] = null;
        $data['name'] = null;
        $data['description'] = null;
        $data['value'] = null;

        var_dump($app['productsService']);

        return $app['productsService']->delete($data);

    }
}
