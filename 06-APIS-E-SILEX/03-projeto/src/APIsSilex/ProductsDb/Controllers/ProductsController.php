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

        $app['productsService'] = function () {
            $products = new Products();
            $productsMapper = new ProductsMapper();
            $productsService = new ProductsService($products, $productsMapper);

            return $productsService;
        };

        $productsController->get('/', function () use ($app) {

            $data['name'] = null;
            $data['description'] = null;
            $data['value'] = null;

            $result = $app['productsService']->fetchAll($data);

            return $app['twig']->render('content.twig', ['products' => $result]);
        })->bind('lista');

        $productsController->get('/produto/{id}', function ($id) use ($app) {

            $data['name'] = null;
            $data['description'] = null;
            $data['value'] = null;

            $result = $app['productsService']->fetchAll($data);

            return $app['twig']->render('products.twig', ['products' => $result[$id-1]]);
        })->bind("produto");





//        $productsController->get('/insert', function () use ($app) {
//
//            $data['name'] = null;
//            $data['description'] = null;
//            $data['value'] = null;
//
//            $result = $app['productsService']->insert($data);
//
//            return $app['twig']->render('insert.twig', ['products' => $result]);
//        })->bind("insert");






        $productsController->get('/insert', function () use ($app) {
            return $app['twig']->render('insert.twig', []);
        })->bind("insert");





        $productsController->post('/inserir', function (Request $request) use ($app) {

            $data = $request->request->all();
            $products = new Products();
            $products->setName($data['name']);
            $products->setDescription($data['description']);
            $products->setValue($data['value']);

            $app['productsService']->insert($data);


            if ($app['productsService']->insert($data)) {
                return $app->redirect($app['url_generator']->generate('sucesso'));
            } else {
                $app->abort(500, "ERROR: Erro ao cadastar!");
            }

        })->bind("inserir");





        $productsController->get('/sucesso', function () use ($app) {
            return $app['twig']->render('sucesso.twig', []);
        })->bind("sucesso");

        return $productsController;
    }
}