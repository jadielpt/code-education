<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 01/08/14
 * Time: 16:12
 * 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: clientes.php
 * Linguagem: php
 */
use \src\app\classes\ClientesPessoasFisicas as ClientesPessoasFisicas;

$clientes[0] = new ClientesPessoasFisicas(1, "Candido Souza", "candido@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes[0]->setCelular(17977777777);

$clientes[1] = new \src\app\classes\ClientesPessoasJuridicas(2, "Estofados ME", "estofados@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes[1]->setFax(17977777777);

$clientes[2] = new ClientesPessoasFisicas(3, "Claudia Bertolin", "claudia@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 3, "Votuporanga", "SP");
$clientes[2]->setCelular(17977777777);

$clientes[3] = new \src\app\classes\ClientesPessoasJuridicas(4, "Livros SA", "livros@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 4, "Votuporanga", "SP");
$clientes[3]->setFax(17977777777);

$clientes[4] = new ClientesPessoasFisicas(5, "Felipe Bertolin de Souza", "felipe@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes[4]->setCelular(17977777777);

$clientes[5] = new \src\app\classes\ClientesPessoasJuridicas(6, "Petrobras do Brasil SA", "petrobras@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes[5]->setFax(17977777777);

$clientes[6] = new ClientesPessoasFisicas(7, "Maria Helena", "maria@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes[6]->setCelular(17977777777);

$clientes[7] = new \src\app\classes\ClientesPessoasJuridicas(8, "Coca Cola SA", "cocacola@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 2, "Votuporanga", "SP");
$clientes[7]->setFax(17977777777);

$clientes[8] = new ClientesPessoasFisicas(9, "Vitor Souza", "vitor@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 4, "Votuporanga", "SP");
$clientes[8]->setCelular(17977777777);

$clientes[9] = new \src\app\classes\ClientesPessoasJuridicas(10, "Microsoft do Brasil SA", "micro@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes[9]->setFax(17977777777);

//echo '<pre>';
//print_r($clientes);
//echo '</pre>';

//echo $clientes[0]->getNome();
//echo $clientes[0]->getSobrenome();
