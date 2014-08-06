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
use CandidoSouza\Clientes\Types\ClientesPessoasFisicas as ClientesPessoasFisicas;
use CandidoSouza\Clientes\Types\ClientesPessoasJuridicas as ClientesPessoasJuridicas;

$clientes[0] = new ClientesPessoasFisicas(1, "Candido Souza", "candido@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes[0]->setCelular(1795757557)
            ->setTelContato(null)
            ->setCobrRua(null)
            ->setCobrNumero(null)
            ->setCobrComplemento(null)
            ->setCobrBairro(null)
            ->setCobrCep(null)
            ->setCobrMunicipio(null)
            ->setCobrUf(null)
;

$clientes[1] = new ClientesPessoasJuridicas(2, "Estofados ME", "estofados@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes[1]->setFax(17939393939)
            ->setTelContato(1798765432)
            ->setCobrRua('Amazonas')
            ->setCobrNumero('77')
            ->setCobrComplemento('Ap.4 - Sala 02')
            ->setCobrBairro('Jd.São Paulo')
            ->setCobrCep(15500000)
            ->setCobrMunicipio('Votuporanga')
            ->setCobrUf('SP')
;

$clientes[2] = new ClientesPessoasFisicas(3, "Claudia Bertolin", "claudia@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 3, "Votuporanga", "SP");
$clientes[2]->setCelular(17977777777);

$clientes[3] = new ClientesPessoasJuridicas(4, "Livros SA", "livros@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 4, "Votuporanga", "SP");
$clientes[3]->setFax(179999999)
            ->setTelContato(179999999)
            ->setCobrRua('Rua Dos Lirios')
            ->setCobrNumero('7777')
            ->setCobrComplemento('Bloco 01 - Sala 02')
            ->setCobrBairro('Jd.Paulistano')
            ->setCobrCep(15502210)
            ->setCobrMunicipio('Votuporanga')
            ->setCobrUf('SP')
;

$clientes[4] = new ClientesPessoasFisicas(5, "Felipe Bertolin de Souza", "felipe@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes[4]->setCelular(17977777777)
            ->setTelContato(null)
            ->setCobrRua(null)
            ->setCobrNumero(null)
            ->setCobrComplemento(null)
            ->setCobrBairro(null)
            ->setCobrCep(null)
            ->setCobrMunicipio(null)
            ->setCobrUf(null)
;

$clientes[5] = new ClientesPessoasJuridicas(6, "Petrobras do Brasil SA", "petrobras@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes[5]->setFax(1717171717);

$clientes[6] = new ClientesPessoasFisicas(7, "Maria Helena", "maria@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", "Normal", "Votuporanga", "SP");
$clientes[6]->setCelular(17951515151)
            ->setTelContato(1777777777)
            ->setCobrRua('Santos Dumont')
            ->setCobrNumero(7)
            ->setCobrComplemento('Loja')
            ->setCobrBairro('Vera Cruz')
            ->setCobrCep(15555000)
            ->setCobrMunicipio('Bauru')
            ->setCobrUf('SP')
;

$clientes[7] = new ClientesPessoasJuridicas(8, "Coca Cola SA", "cocacola@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 2, "Votuporanga", "SP");
$clientes[7]->setFax(1737773737);

$clientes[8] = new ClientesPessoasFisicas(9, "Vitor Souza", "vitor@email.com.br", "Pessoa Física", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 4, "Votuporanga", "SP");
$clientes[8]->setCelular(1799999777);

$clientes[9] = new ClientesPessoasJuridicas(10, "Microsoft do Brasil SA", "micro@email.com.br", "Pessoa Júridica", 77777777777, 32435549, "Piauí", 777, "Centro", 15500000, "casa", 5, "Votuporanga", "SP");
$clientes[9]->setFax(179999999)
            ->setTelContato(173997777)
            ->setCobrRua('Microsoft do Brasil')
            ->setCobrNumero('1')
            ->setCobrComplemento('Bloco 01 - Sala 02')
            ->setCobrBairro('Jd.Microsoft do Brasil')
            ->setCobrCep(15502210)
            ->setCobrMunicipio('Votuporanga')
            ->setCobrUf('SP')
;

