<?php
/**
 * User: candidosouza
 * Date: 13/08/14
 * Time: 08:15
 * 04 - Projeto Persistência de dados | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
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