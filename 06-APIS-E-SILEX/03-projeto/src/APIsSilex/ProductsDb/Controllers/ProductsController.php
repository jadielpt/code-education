<?php

namespace APIsSilex\ProductsDb\Controllers;

use APIsSilex\ProductsDb\Interfaces\ProductsControllerInterface;
use APIsSilex\ProductsDb\Service\ProductsService;
use APIsSilex\ProductsDb\Entity\Products;
use APIsSilex\ProductsDb\Mapper\ProductsMapper;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ProductsController implements ProductsControllerInterface
{
    public function connect(Application $app)
    {
        $productsController = $app['controllers_factory'];

        $app['productsService'] = function() {
            $products = new Products();
            $productsMapper = new ProductsMapper();
            $productsService = new ProductsService($products, $productsMapper);

            return $productsService;
        };

        $productsController->get('/', function () use($app) {

            $data['name'] = null;
            $data['description'] = null;
            $data['value'] = null;

            $result = $app['productsService']->fetchAll($data);

            return $app['twig']->render('content.twig', ['products' => $result]);
        });

        $productsController->get('/produto/{id}', function ($id) use($app) {

            $data['name'] = null;
            $data['description'] = null;
            $data['value'] = null;

            $result = $app['productsService']->fetchAll($data);

            return $app['twig']->render('products.twig', ['products' => $result[$id-1]]);
        })->bind("produto");

        $productsController->get('/inserir', function () use($app) {

            $data['name'] = null;
            $data['description'] = null;
            $data['value'] = null;

            $result = $app['productsService']->insert($data);

            return $app['twig']->render('insert.twig', ['products' => $result]);
        })->bind("inserir");

        return $productsController;
    }


}