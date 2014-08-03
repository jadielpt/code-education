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
use \src\app\classes\Clientes as Clientes;

$clientes[0] = new Clientes(1, "Candido", "Souza", "12345678912", "candido@email.com.br", 32435549, "Piauí", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[1] = new Clientes(2, "Claudia", "Bertolin", "12345678912", "claudia@email.com.br", 32435549, "Amazona", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[2] = new Clientes(3, "Felipe", "Bertolin de Souza", "12345678912", "felipe@email.com.br", 32435549, "Pernanbuco", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[3] = new Clientes(4, "Maria", "Helena", "12345678912", "maria@email.com.br", 32435549, "São Paulo", 1, "Bloco 01 Sala 02", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[4] = new Clientes(5, "Vitor", "Souza", "12345678912", "vitor@email.com.br", 32435549, "Alagoas", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[5] = new Clientes(6, "Marcia", "Souza", "12345678912", "marcia@email.com.br", 32435549, "Paraná", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[6] = new Clientes(7, "Ailton", "Gonçalves", "12345678912", "ailton@email.com.br", 32435549, "Minas", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[7] = new Clientes(8, "Jenifer", "Souza", "12345678912", "jenifer@email.com.br", 32435549, "Bahia", 1, "Apto 07", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[8] = new Clientes(9, "Carlos", "Amaral", "12345678912", "carlos@email.com.br", 32435549, "Sergipe", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[9] = new Clientes(10, "Luciana", "Goulart", "12345678912", "luciana@email.com.br", 32435549, "Av. Brasil", 1, null, "São Paulo", "15500-000", "São Paulo", "sp" );




//echo '<pre>';
//print_r($clientes);
//echo '</pre>';

//echo $clientes[0]->getNome();
//echo $clientes[0]->getSobrenome();
