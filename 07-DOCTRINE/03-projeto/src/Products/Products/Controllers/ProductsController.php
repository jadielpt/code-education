<?php

namespace Products\Products\Controllers;

use Products\Products\Interfaces\ProductsControllerApiInterface;
use Products\Products\Service\ProductsServiceApi;
use Products\Entity\ProductsApi;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use Symfony\Component\Validator\Constraints as Assert;

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

            return $app['twig']->render('home.twig', []);

        });


        $productsController->get('/{page}', function ($page) use ($app) {

            $data = $app['productsService']->pagination(5,$page);

            return $app['twig']->render('content.twig', ['products' => $data, 'data' => $data->count()]);
        })->bind('lista_page');

        $productsController->get('/produto/{id}', function ($id) use ($app) {
            $products = new ProductsApi();
            $data['name'] = $products->getName();
            $data['description'] = $products->getDescription();
            $data['value'] = $products->getDescription();

            $result = $app['productsService']->findOneById($id);

            return $app['twig']->render('products.twig', ['products' => $result]);

        })->bind("produto");








        $app->get('novo/produto/form', function (Request $request) use ($app) {


            $data = array(
                'name',
                'email',
            );

            /**
             * @var $form \Symfony\Component\Form\FormFactory
             */
            $form = $app['form.factory']->createBuilder('form', $data)
                ->add('name', 'text', array(
                    'label' => 'Nome',
                    'attr' => array(
                        'placeholder' => 'Seu Nome'
                    ),
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\Length(array(
                                'min' => 5
                            )
                        )
                    )
                ))
                ->add('email', 'text', array(
                    'label' => 'Email',
                    'attr' => array(
                        'placeholder' => 'Seu Email'
                    ),
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\Email()
                    )
                ))
                ->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                die('Form válido');
            }


            return $app['twig']->render('insert.twig', array(
                'form' => $form->createView()
            ));

        })->method('GET|POST')->bind('insert');





















        $productsController->post('novo/produto', function (Request $request) use ($app) {

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

        $productsController->get('/novo/produto/sucesso', function () use ($app) {
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
                return $app->redirect($app['url_generator']->generate('lista_page',['page' => 1]));
            } else {
                $app->abort(500, "ERROR: Erro ao alterar o cadastro!");
            }

        })->bind("update");
        
        $productsController->get('/delete/{id}', function ( $id) use ($app) {

            if ($app['productsService']->delete($id)) {
                return $app->redirect($app['url_generator']->generate('lista_page',['page' => 1]));
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