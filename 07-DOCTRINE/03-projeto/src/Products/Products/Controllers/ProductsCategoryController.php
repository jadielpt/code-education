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

class ProductsCategoryController implements ProductsCategoryControllerInterface
{
    public function connect(Application $app, EntityManager $em)
    {
        $productsCategoryController = $app['controllers_factory'];

        $app['productsCategoryService'] = function () use ($em) {

            $productsCategoryService = new ProductsCategoryService($em);

            return $productsCategoryService;
        };

        $productsCategoryController->get('/{page}', function ($page) use ($app) {

            $data = $app['productsCategoryService']->pagination(5,$page);

            return $app['twig']->render('content_category.twig', ['category' => $data, 'data' => $data->count()]);
        })->bind('lista_category');

        $productsCategoryController->get('/categoria/{id}', function ($id) use ($app) {
            $productsCategory = new ProductsCategory();
            $data['category_ name'] = $productsCategory->getCategoryName();

            $result = $app['productsCategoryService']->findOneById($id);

            return $app['twig']->render('category.twig', ['category' => $result]);

        })->bind("category_id");

        $app->get('nova/categoria/form', function (Request $request) use ($app) {


            $data = array(
                'name'
            );

            /**
             * @var $form \Symfony\Component\Form\FormFactory
             */
            $form = $app['form.factory']->createBuilder('form', $data)
                ->add('name', 'text', [
                    'required' => true,
                    'label' => 'Nome',
                    'attr' => [
                        'placeholder' => 'Nome da Categoria',
                        'class'     => 'form-control'
                    ],
                    'constraints' => [
                        new Assert\NotBlank(),
                        new Assert\Length([
                                'min' => 5
                            ]
                        )
                    ]
                ])
                ->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                die('Form válido');
            }

            return $app['twig']->render('insert_category.twig', array(
                'form' => $form->createView()
            ));

        })->method('GET|POST')->bind('insert_categoria');

        $productsCategoryController->post('nova/categoria', function (Request $request) use ($app) {

            $data = $request->request->all();

            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['form']['name']);


            if ($app['productsCategoryService']->insert($data)) {
                return $app->redirect($app['url_generator']->generate('sucesso_category'));
            } else {
                $app->abort(500, "ERROR: Erro ao cadastar!");
            }

        })->bind("inserir_category");


        $productsCategoryController->get('/nova/categoria/sucesso', function () use ($app) {
            return $app['twig']->render('sucesso_category.twig', []);
        })->bind("sucesso_category");

        $productsCategoryController->get('/categoria/atualizar/{id}', function ($id) use ($app) {
            $productsCategory = new ProductsCategory();
            $data['name'] = $productsCategory->getCategoryName();

            $result = $app['productsCategoryService']->findOneById($id);

            return $app['twig']->render('atualizar_category.twig', ['category' => $result]);

        })->bind("atualizar_category");

        $productsCategoryController->post('/categoria/update/{id}', function (Request $request, $id) use ($app) {

            $data = $request->request->all();
            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['name']);

            if ($app['productsCategoryService']->update($data, $id)) {
                return $app->redirect($app['url_generator']->generate('lista_category',['page' => 1]));
            } else {
                $app->abort(500, "ERROR: Erro ao alterar o cadastro!");
            }

        })->bind("update_category");

        $productsCategoryController->get('/categoria/delete/{id}', function ( $id) use ($app) {

            if ($app['productsCategoryService']->delete($id)) {
                return $app->redirect($app['url_generator']->generate('lista_category',['page' => 1]));
            } else {
                $app->abort(500, "ERROR: Erro ao deletar o cadastro!");
            }
        })->bind("delete");

        return $productsCategoryController;

    }

} 