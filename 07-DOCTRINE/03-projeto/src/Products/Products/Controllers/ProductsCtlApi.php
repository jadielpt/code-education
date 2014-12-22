<?php

namespace Products\Products\Controllers;

Use Products\Products\Entity\ProductsApi;
use Products\Products\Entity\ProductsCategory;
use Products\Products\Entity\Tag;
use Products\Products\Service\ProductsServiceApi;
use Products\Products\Service\Serialize;
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

        //****************************************************//
        //lista produtos
        //****************************************************//
        $productsControllerApi->get('/', function () use ($app) {

            $result = $app['productsServiceApi']->fetchAll();

            $products = [];
            $tags = [];
            foreach($result as $key){
                /**
                 * @var $key \Products\Products\Entity\ProductsApi
                 */
                $products[$key->getId()]['id'] = $key->getId();
                $products[$key->getId()]['name'] = $key->getName();
                $products[$key->getId()]['description'] = $key->getDescription();
                $products[$key->getId()]['value'] = $key->getValue();
                $products[$key->getId()]['category'] = $key->getCategory()->getCategoryName();

                $tagsProducts = $key->getTags();

                foreach($tagsProducts as $keyTags){
                    $tags[$keyTags->getId()]['id'] = $key->getId();
                    $tags[$keyTags->getId()]['name'] = $keyTags->getName();
                }
                $products[$key->getId()]['tags'] = $keyTags;

            };

            return $app->json($products);
        });

        //****************************************************//
        //lista produto por id
        //****************************************************//
        $productsControllerApi->get('/{id}', function ($id) use ($app) {

            $result = $app['productsServiceApi']->findOneById($id);

            $data['id'] = $result->getId();
            $data['name'] = $result->getName();
            $data['description'] = $result->getDescription();
            $data['value'] = $result->getValue();
            $data['category'] = $result->getCategory()->getCategoryName();

            $tags = $result->getTags();
            foreach ($tags as $key => $tag) {
                $data['tags'] = $tag;
            };

            return $app->json($data);

        })->bind('api-produtos-id');

        //****************************************************//
        //insere produtos
        //****************************************************//
        $productsControllerApi->post('/', function (Request $request) use ($app) {

            $data['form']['name'] = $request->get('name');
            $data['form']['description'] = $request->get('description');
            $data['form']['value'] = $request->get('value');
            $data['form']['category'] = $request->get('category');
            $data['form']['tags'] = $request->get('tags');

            $products = new ProductsApi();
            $products->setName($data['form']['name']);
            $products->setDescription($data['form']['description']);
            $products->setValue($data['form']['value']);

            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['form']['category']);

            $tags = new Tag();
            $tags->setName($data['form']['tags']);

            $products->setCategory($productsCategory);
            $products->addTag($tags);

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



        //****************************************************//
        //altera produto
        //****************************************************//
        $productsControllerApi->put('/{id}', function (Request $request, $id) use ($app) {

            $data['id'] =  $id;
            $data['name'] = $request->get('name');
            $data['description'] = $request->get('description');
            $data['value'] = $request->get('value');
            $data['category'] = $request->get('category');
            $data['tags'] = $request->get('tags');


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


        //****************************************************//
        //deleta produtos
        //****************************************************//
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