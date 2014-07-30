<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 30/07/14
 * Time: 09:10
 */

namespace src\app\interfaces;


/**
 * Interface ClienteInterface
 * @package src\app\classes
 */
interface ClientesInterface
{
    public function getNomeRS();

    public function getCnpjCpf();

    public function getRua();

    public function getNumero();

    public function getComplemento();

    public function getBairro();

    public function getCep();

    public function getMunicipio();

    public function getUf();

    public function getTelefone();
}