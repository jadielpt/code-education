<?php

namespace APIsSilex\ProductsDb\Controllers;

use APIsSilex\ProductsDb\Interfaces\ProductsControllerInterface;
use APIsSilex\ProductsDb\Service\ProductsService;
use APIsSilex\ProductsDb\Entity\Products;
use APIsSilex\ProductsDb\Mapper\ProductsMapper;
use Silex\Application;

class ProductsController implements ProductsControllerInterface
{
    public function connect(Application $app)
    {
        $app['productsService'] = function() {
            $products = new Products();
            $productsMapper = new ProductsMapper();
            $productsService = new ProductsService($products, $productsMapper);

            return $productsService;
        };

        $app->get("/", function () use ($app){

            $data['name'] = null;
            $data['description'] = null;
            $data['value'] = null;

            $result = $app['productsService']->insert($data);

            return $app->json($result);
        });
    }
}