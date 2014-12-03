<?php

namespace Products\Interfaces;

use Silex\Application;
use Doctrine\ORM\EntityManager;

interface ProductsControllerApiInterface
{
    public function connect(Application $app, EntityManager $em);
}
