<?php

namespace Products\Products\Controllers;

Use Products\Products\Entity\ProductsApi;
use Products\Products\Entity\ProductsCategory;
use Products\Products\Service\ProductsServiceApi;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class ProductsCtlApi implements \Products\Products\Interfaces\ProductsControllerApiInterface
{
    public function connect(Application $app, EntityManager $em) {

        $productsControllerApi = $app['controllers_factory'];

        /**
         * @return ProductsServiceApi
         */
        $app['productsServiceApi'] = function () use ($em) {

            $productsService = new ProductsServiceApi($em);

            return $productsService;
        };

        $productsControllerApi->get('/', function () use ($app) {

            $result = $app['productsServiceApi']->fetchAll();

            return $app->json($result);

        });


        $productsControllerApi->get('/{id}', function ($id) use ($app) {

            return  $app->json($app['productsServiceApi']->findOneById($id));


        })->bind('api-produtos-id');

        $productsControllerApi->post('/', function (Request $request) use ($app) {

            $data['form']['name'] = $request->get('name');
            $data['form']['description'] = $request->get('description');
            $data['form']['value'] = $request->get('value');
            $data['form']['category'] = $request->get('category');

            $products = new ProductsApi();
            $products->setName($data['form']['name']);
            $products->setDescription($data['form']['description']);
            $products->setValue($data['form']['value']);

            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['form']['category']);

            $products->setCategory($productsCategory);

            if(!is_numeric($data['form']['value'])){
                $app->abort(500, "ERROR: O VALOR DEVE SER NUMÉRICO, OU ESTÁ EM UM FORMATO INCORRETO!");
            }


            if ( $app['productsServiceApi']->insert($data)) {
                return $app->json([
                    'SUCCESS' => true,
                    'SUCCESS' => 'Data successfully registered in database',
                    'SUCESSO' => 'Dados cadastrados com sucesso no banco'
                ]);
            } else {
                return $app->json([
                    "SUCCESS" => false,
                    'ERROR' => 'Error inserting product!',
                    'ERRO'  => 'Erro ao cadastrar Produto!'
                ]);
            }

        })->bind("api-produtos-inserir");



        $productsControllerApi->put('/{id}', function (Request $request, $id) use ($app) {

            $data['id'] =  $id;
            $data['name'] = $request->get('name');
            $data['description'] = $request->get('description');
            $data['value'] = $request->get('value');

            if ($app['productsServiceApi']->update($data, $id)) {
                return $app->json([
                    "SUCCESS" => true,
                    'SUCCESS' => 'Successful update data in database',
                    'SUCESSO' => 'Dados Alterado com sucesso no banco'
                ]);
            } else {
                return $app->json([
                    "SUCCESS" => false,
                    'ERROR' => 'Error Changing Product!',
                    'ERRO'  => 'Erro ao alterar Produto!'
                ]);
            }

        })->bind("api-produtos-put");


        
        $productsControllerApi->delete('/{id}', function ( $id) use ($app) {

            if ($app['productsServiceApi']->delete($id)) {
                return $app->json([
                    "SUCCESS" => true,
                    'SUCCESS' => 'Data successfully deleted the seat',
                    'SUCESSO' => 'Dados deletado com sucesso no banco'
                ]);
            } else {
                return $app->json([
                    "SUCCESS" => false,
                    'ERROR' => 'Error deleting Product!',
                    'ERRO'  => 'Erro ao deletar Produto!'
                ]);
            }
        })->bind("api-produtos-delete");
        
        return $productsControllerApi;

    }
}