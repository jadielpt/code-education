<?php

namespace APIsSilex\ProductsDB\Interfaces;

use Silex\Application;

interface ProductsControllerInterface 
{
    public function connect(Application $app);
    
    public function getProducts(Application $app);
    
    public function getProductsId(Application $app, $id);

    public function getInsert(Application $app);

    public function getUpdate(Application $app, $id);

    public function getDelete(Application $app, $id);


}
