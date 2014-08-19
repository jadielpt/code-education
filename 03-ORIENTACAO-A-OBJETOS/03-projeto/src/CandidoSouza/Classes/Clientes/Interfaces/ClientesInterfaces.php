<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 01/08/14
 * Time: 17:51
 * 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesInterfaces.php
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Clientes\Interfaces;


/**
 * Interface ClientesInterfaces
 * @package CandidoSouza\Clientes\Interfaces
 */
interface ClientesInterfaces
{
    public function getNomeRS();

    public function getCnpjCpf();

    public function getEmail();

    public function getTelefone();

    public function getRua();

    public function getNumero();

    public function getComplemento();

    public function getBairro();

    public function getCep();

    public function getMunicipio();

    public function getUf();

    public function getTipo();

    public function getGrauImportance();

}