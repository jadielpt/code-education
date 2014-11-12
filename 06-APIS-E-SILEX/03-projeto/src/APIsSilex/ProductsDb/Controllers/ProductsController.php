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

        $productsController->get('/insert', function () use ($app) {
            return $app['twig']->render('insert.twig', []);
        })->bind("insert");

        $productsController->post('/inserir', function (Request $request) use ($app) {

            $data = $request->request->all();
            $products = new Products();
            $products->setName($data['name']);
            $products->setDescription($data['description']);
            $products->setValue($data['value']);

            if ($app['productsService']->insert($data)) {
                return $app->redirect($app['url_generator']->generate('sucesso'));
            } else {
                $app->abort(500, "ERROR: Erro ao cadastar!");
            }

        })->bind("inserir");


        $productsController->get('/sucesso', function () use ($app) {
            return $app['twig']->render('sucesso.twig', []);
        })->bind("sucesso");










        $productsController->get('/atualizar/{id}', function ($id) use ($app) {
            $products = new Products();
            $data['name'] = $products->getName();
            $data['description'] = $products->getDescription();
            $data['value'] = $products->getDescription();

            $result = $app['productsService']->fetchAll($data);

            return $app['twig']->render('atualizar.twig', ['products' => $result[$id-1]]);
        })->bind("atualizar");


        $productsController->post('/update/{id}', function (Request $request) use ($app) {

            $data['id'] =  $request->request->get('id');
            $data['name'] = $request->request->get('nome');
            $data['description'] = $request->request->get('description');
            $data['value'] = $request->request->get('value');

            var_dump($app['productsService']->update($data, $data['id']));die;
            //return $app['productsService']->update($data);

            if ($app['productsService']->update($data, $data['id'])) {
                return $app->redirect($app['url_generator']->generate('lista'));
            } else {
                $app->abort(500, "ERROR: Erro ao alterar o cadastro!");
            }

        })->bind("update");



        return $productsController;
    }
}