<?php

namespace APIsSilex\ProductsApi\Controllers;

use APIsSilex\ProductsApi\Interfaces\ProductsControllerInterface;
use APIsSilex\ProductsApi\Service\ProductsService;
use APIsSilex\ProductsApi\Entity\Products;
use APIsSilex\ProductsApi\Mapper\ProductsMapper;
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

            $result = $app['productsService']->fetchAll();

            return $app->json($result);

        })->bind('api-produtos');


        $productsController->get('/{id}', function ($id) use ($app) {

            $result = $app['productsService']->findOneById($id);

            return $app->json($result);

        })->bind('api-produtos-id');

        $productsController->post('/', function (Request $request) use ($app) {

            $data['name'] = $request->get('name');
            $data['description'] = $request->get('description');
            $data['value'] = $request->get('value');

            $products = new Products();
            $products->setName($data['name']);
            $products->setDescription($data['description']);
            $products->setValue($data['value']);


            if ( $app['productsService']->insert($data)) {
                return $app->json([
                    'SUCCESS' => 'Data successfully registered in database',
                    'SUCESSO' => 'Dados cadastrados com sucesso no banco'
                ]);
            } else {
                return $app->json([
                    'ERROR' => 'Error inserting product!',
                    'ERRO'  => 'Erro ao cadastrar Produto!'
                ]);
            }

        })->bind("api-produtos-inserir");







        $productsController->put('/{id}', function (Request $request) use ($app) {

            $data['id'] = $request->request->get('id');
            $data['name'] = $request->request->get('name');
            $data['description'] = $request->request->get('description');
            $data['value'] = $request->request->get('value');

            $products = new Products();
            $products->setName($data['name']);
            $products->setDescription($data['description']);
            $products->setValue($data['value']);


            if ($app['productsService']->update($data)) {
                return $app->json([
                    'SUCCESS' => 'Successful update data in database',
                    'SUCESSO' => 'Dados Alterado com sucesso no banco'
                ]);
            } else {
                return $app->json([
                    'ERROR' => 'Error Changing Product!',
                    'ERRO'  => 'Erro ao alterar Produto!'
                ]);
            }

        })->bind("api-produtos-update");






        
        $productsController->delete('/{id}', function ( $id) use ($app) {

            if ($app['productsService']->delete($id)) {
                return $app->json([
                    'SUCCESS' => 'Data successfully deleted the seat',
                    'SUCESSO' => 'Dados deletado com sucesso no banco'
                ]);
            } else {
                return $app->json([
                    'ERROR' => 'Error deleting Product!',
                    'ERRO'  => 'Erro ao deletar Produto!'
                ]);
            }
        })->bind("api-produtos-delete");
        
        return $productsController;
    }
}