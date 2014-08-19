<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 04/08/14
 * Time: 12:51
 * 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: EndCobrancaInterfaces.php
 * Linguagem: php
 */

namespace src\app\interfaces;


/**
 * Interface EndCobrancaInterface
 * @package src\app\interfaces
 */
interface EndCobrancaInterface
{
    public function getTelContato();

    public function getCobrRua();

    public function getCobrNumero();

    public function getCobrComplemento();

    public function getCobrBairro();

    public function getCobrCep();

    public function getCobrMunicipio();

    public function getCobrUf();
} 