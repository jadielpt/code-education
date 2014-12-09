<?php

namespace Products\Controllers;

use Products\Interfaces\ProductsControllerApiInterface;
use Products\Service\ProductsServiceApi;
use Products\Entity\ProductsApi;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class ProductsController implements ProductsControllerApiInterface
{
    public function connect(Application $app, EntityManager $em)
    {
        $productsController = $app['controllers_factory'];

        $app['productsService'] = function () use ($em) {

            $productsService = new ProductsServiceApi($em);

            return $productsService;
        };

        $productsController->get('/', function () use ($app) {

            $result = $app['productsService']->fetchAll();

            $data = $app['productsService']->pagination($result);

            return $app['twig']->render('content.twig', ['products' => $data]);
        })->bind('lista');

        $productsController->get('/ordem-name', function () use ($app) {

            $result = $app['productsService']->OrderByName();

            return $app['twig']->render('content.twig', ['products' => $result]);
        })->bind('order-name');

        $productsController->get('/ordem-value', function () use ($app) {

            $result = $app['productsService']->OrderByValue();

            return $app['twig']->render('content.twig', ['products' => $result]);
        })->bind('order-value');

        $productsController->get('/produto/{id}', function ($id) use ($app) {
            $products = new ProductsApi();
            $data['name'] = $products->getName();
            $data['description'] = $products->getDescription();
            $data['value'] = $products->getDescription();

            $result = $app['productsService']->findOneById($id);

            return $app['twig']->render('products.twig', ['products' => $result]);

        })->bind("produto");

        $productsController->get('/insert', function () use ($app) {
            return $app['twig']->render('insert.twig', []);
        })->bind("insert");

        $productsController->post('/inserir', function (Request $request) use ($app) {

            $data = $request->request->all();
            $products = new ProductsApi();
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
            $products = new ProductsApi();
            $data['name'] = $products->getName();
            $data['description'] = $products->getDescription();
            $data['value'] = $products->getDescription();

            $result = $app['productsService']->findOneById($id);

            return $app['twig']->render('atualizar.twig', ['products' => $result]);

        })->bind("atualizar");

        $productsController->post('/update/{id}', function (Request $request, $id) use ($app) {

            $data = $request->request->all();
            $products = new ProductsApi();
            $products->setName($data['name']);
            $products->setDescription($data['description']);
            $products->setValue($data['value']);

            if ($app['productsService']->update($data, $id)) {
                //var_dump($app['productsService']->updateApi($data, $id)); die;
                return $app->redirect($app['url_generator']->generate('lista'));
            } else {
                $app->abort(500, "ERROR: Erro ao alterar o cadastro!");
            }



        })->bind("update");
        
        $productsController->get('/delete/{id}', function ( $id) use ($app) {

            if ($app['productsService']->delete($id)) {
                return $app->redirect($app['url_generator']->generate('lista'));
            } else {
                $app->abort(500, "ERROR: Erro ao deletar o cadastro!");
            }
        })->bind("delete");

        $productsController->post('/produto/busca', function (Request $request) use ($app) {

            $data = $request->request->all();
            $products = new ProductsApi();
            $products->setName($data);


            $result = $app['productsService']->search($data['name']);
;

            if(empty($result)){
                return $app['twig']->render('error.twig', [
                    'mensagem' => 'Nenhum produto encontrado!',
                ]);
            }
            return $app['twig']->render('search.twig', ['products' => $result]);


        })->bind("search");


        
        return $productsController;
    }

}