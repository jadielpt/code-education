<?php

namespace Products\Products\Controllers;

use Products\Products\Entity\Tag;
use Products\Products\Interfaces\ProductsTagsControllerInterface;
use Products\Products\Service\ProductsTagsService;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Validator\Constraints as Assert;

class ProductsTagsCtlApi implements ProductsTagsControllerInterface
{
    public function connect(Application $app, EntityManager $em)
    {
        $productsTagsCtlApi = $app['controllers_factory'];

        $app['productsTagsServiceApi'] = function () use ($em) {

            $productsTagsService = new ProductsTagsService($em);

            return $productsTagsService;
        };

        $productsTagsCtlApi->get('/', function () use ($app) {

            $data = $app['productsTagsServiceApi']->fetchAll();

            return $app->json($data);
        });

        $productsTagsCtlApi->get('/{id}', function ($id) use ($app) {
            $tags = new Tag();
            $data['category_ name'] = $tags->getName();

            $data = $app['productsTagsServiceApi']->findOneById($id);

            return $app->json($data);

        });

        $productsTagsCtlApi->post('/', function (Request $request) use ($app) {

            $data = $request->request->all();

            $tags = new Tag();
            $tags->setName($data['name']);

            if ( $app['productsTagsServiceApi']->insertApi($data)) {
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

        $productsTagsCtlApi->put('/{id}', function (Request $request, $id) use ($app) {
            $data = $request->request->all();
            $data['id'] =  $id;
            $data['name'] = $request->get('name');

            if ($app['productsTagsServiceApi']->update($data, $id)) {
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

        $productsTagsCtlApi->delete('/{id}', function ( $id) use ($app) {

            if ($app['productsTagsServiceApi']->delete($id)) {
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

        return $productsTagsCtlApi;
    }
} 