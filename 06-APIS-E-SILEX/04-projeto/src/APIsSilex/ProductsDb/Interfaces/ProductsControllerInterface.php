<?php

namespace APIsSilex\ProductsDb\Interfaces;

use Silex\Application;

interface ProductsControllerInterface 
{
    public function connect(Application $app);
}
