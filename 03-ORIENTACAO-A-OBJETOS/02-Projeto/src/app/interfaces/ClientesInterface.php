<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 30/07/14
 * Time: 09:10
 */

namespace src\app\interfaces;


/**
 * Interface ClientesInterface
 * @package src\app\interfaces
 */
interface ClientesInterface
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