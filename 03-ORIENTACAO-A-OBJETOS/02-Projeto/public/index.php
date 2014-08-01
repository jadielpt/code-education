<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 20:46
 * Projeto: Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: index.php
 * Linguagem: php
 */
require_once (__DIR__ . '/bootstrap.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
<?php
use src\app\classes\database\Create;

$dados = ['nome'=>'Candido', 'sobrenome'=>'Souza', 'email'=>'email@email.com', 'cpf'=> 7777777];
$connect = new Create();
$connect->exeCreate('clientes', $dados);
echo '<pre>';
var_dump($connect);
echo '<pre>';




echo '<pre>';
print_r($connect);
echo '<pre>';


?>
    </body>
</html>






















