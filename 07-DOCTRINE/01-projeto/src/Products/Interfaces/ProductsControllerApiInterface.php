<?php

namespace Products\Interfaces;

use Silex\Application;

interface ProductsControllerApiInterface
{
    public function connect(Application $app);
}
