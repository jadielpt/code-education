<?php

namespace APIsSilex\ProductsApi\Interfaces;

use Silex\Application;

interface ProductsControllerInterface 
{
    public function connect(Application $app);
}
