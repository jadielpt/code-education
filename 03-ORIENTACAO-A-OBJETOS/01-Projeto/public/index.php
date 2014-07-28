<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//ini_set("log_errors", 1);
//ini_set("error_log", "../errors.log");
date_default_timezone_set('America/Sao_Paulo');
require_once __DIR__ . '/bootstrap.php';
//require_once __DIR__ . '/../vendor/autoload.php';


use \src\app\classes\Clientes as Clientes;

$clientes[0] = new Clientes("Candido", "Souza", "12345678912", "candido@email.com.br", 32435549, "Piauí", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[1] = new Clientes("Claudia", "Bertolin", "12345678912", "claudia@email.com.br", 32435549, "Amazona", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[2] = new Clientes("Felipe", "Bertolin de Souza", "12345678912", "felipe@email.com.br", 32435549, "Pernanbuco", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[3] = new Clientes("Maria", "Helena", "12345678912", "maria@email.com.br", 32435549, "São Paulo", 1, "Bloco 01 Sala 02", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[4] = new Clientes("Vitor", "Souza", "12345678912", "vitor@email.com.br", 32435549, "Alagoas", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[5] = new Clientes("Marcia", "Souza", "12345678912", "marcia@email.com.br", 32435549, "Paraná", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[6] = new Clientes("Ailton", "Gonçalves", "12345678912", "ailton@email.com.br", 32435549, "Minas", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[7] = new Clientes("Jenifer", "Souza", "12345678912", "jenifer@email.com.br", 32435549, "Bahia", 1, "Apto 07", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[8] = new Clientes("Carlos", "Amaral", "12345678912", "carlos@email.com.br", 32435549, "Sergipe", 1, "casa", "São Paulo", "15500-000", "São Paulo", "sp" );
$clientes[9] = new Clientes("Luciana", "Goulart", "12345678912", "luciana@email.com.br", 32435549, "Av. Brasil", 1, null, "São Paulo", "15500-000", "São Paulo", "sp" );



foreach ($clientes as $key => $value) {
    
    echo $value->getNome()." ".$value->getSobrenome()."<br>";
    
}
echo '<pre>';
print_r($clientes[1]);
echo '</pre>';

echo $clientes[0]->getNome();
echo $clientes[0]->getSobrenome();
