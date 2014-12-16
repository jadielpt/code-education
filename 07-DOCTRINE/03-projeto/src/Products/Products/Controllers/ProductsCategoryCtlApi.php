<?php

namespace Products\Products\Controllers;

use Products\Products\Entity\ProductsCategory;
use Products\Products\Interfaces\ProductsCategoryControllerInterface;
use Products\Products\Service\ProductsCategoryService;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Validator\Constraints as Assert;

class ProductsCategoryCtlApi implements ProductsCategoryControllerInterface
{
    public function connect(Application $app, EntityManager $em)
    {
        $productsCategoryCtlApi = $app['controllers_factory'];

        $app['productsCategoryServiceApi'] = function () use ($em) {

            $productsCategoryService = new ProductsCategoryService($em);

            return $productsCategoryService;
        };

        $productsCategoryCtlApi->get('/', function () use ($app) {

            $data = $app['productsCategoryServiceApi']->fetchAll();

            return $app->json($data);
        });

        $productsCategoryCtlApi->get('/{id}', function ($id) use ($app) {
            $productsCategory = new ProductsCategory();
            $data['category_ name'] = $productsCategory->getCategoryName();

            $data = $app['productsCategoryServiceApi']->findOneById($id);

            return $app->json($data);

        });

        $productsCategoryCtlApi->post('/', function (Request $request) use ($app) {

            $data = $request->request->all();

            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['name']);

            if ( $app['productsCategoryServiceApi']->insertApi($data)) {
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
        });

        $productsCategoryCtlApi->put('/{id}', function (Request $request, $id) use ($app) {
            $data = $request->request->all();
            $data['id'] =  $id;
            $data['name'] = $request->get('name');

            if ($app['productsCategoryServiceApi']->update($data, $id)) {
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

        });

        $productsCategoryCtlApi->delete('/{id}', function ( $id) use ($app) {

            if ($app['productsCategoryServiceApi']->delete($id)) {
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
        });

        return $productsCategoryCtlApi;
    }
} 