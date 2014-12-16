<?php

namespace Products\Products\Controllers;

use Products\Products\Entity\ProductsCategory;
use Products\Products\Entity\Tag;
use Products\Products\Interfaces\ProductsTagsControllerInterface;
use Products\Products\Service\ProductsTagsService;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Validator\Constraints as Assert;

class ProductsTagsController implements ProductsTagsControllerInterface
{
    public function connect(Application $app, EntityManager $em)
    {
        $productsTagsController = $app['controllers_factory'];

        $app['productsTagsService'] = function () use ($em) {

            $productsTagsService = new ProductsTagsService($em);

            return $productsTagsService;
        };

        $productsTagsController->get('/{page}', function ($page) use ($app) {

            $data = $app['productsTagsService']->pagination(5,$page);

            return $app['twig']->render('content_tags.twig', ['tags' => $data, 'data' => $data->count()]);
        })->bind('lista_tags');

        $productsTagsController->get('/Tags/{id}', function ($id) use ($app) {
            $tags = new Tag();
            $data['category_ name'] = $tags->getName();

            $result = $app['productsTagsService']->findOneById($id);

            return $app['twig']->render('tags.twig', ['tags' => $result]);

        })->bind("tags_id");


        $productsTagsController->get('nova/Tags/form', function (Request $request) use ($app) {


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

            return $app['twig']->render('insert_tags.twig', array(
                'form' => $form->createView()
            ));

        })->method('GET|POST')->bind('insert_tags');

        $productsTagsController->post('nova/Tags', function (Request $request) use ($app) {

            $data = $request->request->all();

            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['form']['name']);


            if ($app['productsTagsService']->insert($data)) {
                return $app->redirect($app['url_generator']->generate('sucesso_tags'));
            } else {
                $app->abort(500, "ERROR: Erro ao cadastar!");
            }

        })->bind("inserir_tags");


        $productsTagsController->get('/nova/Tags/sucesso', function () use ($app) {
            return $app['twig']->render('sucesso_tags.twig', []);
        })->bind("sucesso_tags");

        $productsTagsController->get('/Tags/atualizar/{id}', function ($id) use ($app) {
            $productsCategory = new ProductsCategory();
            $data['name'] = $productsCategory->getCategoryName();

            $result = $app['productsTagsService']->findOneById($id);

            return $app['twig']->render('atualizar_tags.twig', ['tags' => $result]);

        })->bind("atualizar_tags");

        $productsTagsController->post('/Tags/update/{id}', function (Request $request, $id) use ($app) {

            $data = $request->request->all();
            $productsCategory = new ProductsCategory();
            $productsCategory->setCategoryName($data['name']);

            if ($app['productsTagsService']->update($data, $id)) {
                return $app->redirect($app['url_generator']->generate('lista_tags',['page' => 1]));
            } else {
                $app->abort(500, "ERROR: Erro ao alterar o cadastro!");
            }

        })->bind("update_tags");

        $productsTagsController->get('/Tags/delete/{id}', function ( $id) use ($app) {

            if ($app['productsTagsService']->delete($id)) {
                return $app->redirect($app['url_generator']->generate('lista_tags',['page' => 1]));
            } else {
                $app->abort(500, "ERROR: Erro ao deletar o cadastro!");
            }
        })->bind("delete_tags");

        return $productsTagsController;

    }

} 