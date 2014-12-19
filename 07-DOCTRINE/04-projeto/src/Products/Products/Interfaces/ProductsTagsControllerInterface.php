<?php

namespace Products\Products\Interfaces;

use Silex\Application;
use Doctrine\ORM\EntityManager;

interface ProductsTagsControllerInterface
{
    public function connect(Application $app, EntityManager $em);
} 