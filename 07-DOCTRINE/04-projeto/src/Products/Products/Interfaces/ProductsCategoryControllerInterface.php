<?php

namespace Products\Products\Interfaces;

use Silex\Application;
use Doctrine\ORM\EntityManager;

interface ProductsCategoryControllerInterface
{
    public function connect(Application $app, EntityManager $em);

} 