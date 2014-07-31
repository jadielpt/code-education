<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 20:46
 */
require_once (__DIR__ . '/bootstrap.php');

use \src\app\classes\clientes\ClientesPessoasFisicas as CliFisica;

$cliente = new CliFisica('candido','77777777777', 'candido@email.com', '7777-7777');
echo '<pre>';
print_r($cliente);
echo '</pre>';
