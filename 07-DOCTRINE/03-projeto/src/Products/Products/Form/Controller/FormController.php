<?php

namespace Products\Products\Form\Controller;

use Symfony\Component\Validator\Constraint as Assert;
//use Symfony\Component\Form\Extension\Validator\Constraints
//use Symfony\Component\Validator\Constraints

use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Application;

class FormController
{
    public function connect(Application $app)
    {
        $app->match('/form', function (Request $request) use ($app) {
            // some default data for when the form is displayed the first time
            $data = array(
                'name' => 'Your name',
                'email' => 'Your email',
            );

            $form = $app['form.factory']->createBuilder('form', $data)
                ->add('name')
                ->add('email')
                ->add('gender', 'choice', array(
                    'choices' => array(1 => 'male', 2 => 'female'),
                    'expanded' => true,
                ))
                ->getForm();

//            $form->handleRequest($request);
//
////            if ($form->isValid()) {
////                $data = $form->getData();
////
////                // do something with the data
////
////                // redirect somewhere
////                return $app->redirect('...');
////            }
//
//            // display the form
            return $app['twig']->render('insert.twig', array('form' => $form->createView()));
        });
    }

} 