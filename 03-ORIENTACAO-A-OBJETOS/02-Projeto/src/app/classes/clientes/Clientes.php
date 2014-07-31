<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 29/07/14
 * Time: 21:03
 */

namespace src\app\classes\clientes;


use src\app\interfaces\ClientesInterface;

/**
 * Class Clientes
 * @package src\app\classes\clientes
 */
class Clientes implements ClientesInterface
{
    protected $nomeRS;
    protected $cnpjCpf;
    protected $email;
    protected $telefone;
    protected $rua;
    protected $numero;
    protected $complemento;
    protected $bairro;
    protected $cep;
    protected $municipio;
    protected $uf;
    protected $tipo;
    protected $grauImportance;

    /**
     * @param $nomeRS
     * @param $cnpjCpf
     * @param $email
     * @param $telefone
     */
    function __construct($nomeRS, $cnpjCpf, $email, $telefone)
    {
        $this->nomeRS = $nomeRS;
        $this->cnpjCpf = $cnpjCpf;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    /**
     * @param mixed $nomeRS
     */
    public function setNomeRS($nomeRS)
    {
        $this->nomeRS = $nomeRS;
    }

    /**
     * @return mixed
     */
    public function getNomeRS()
    {
        return $this->nomeRS;
    }

    /**
     * @param mixed $cnpjCpf
     */
    public function setCnpjCpf($cnpjCpf)
    {
        $this->cnpjCpf = $cnpjCpf;
    }

    /**
     * @return mixed
     */
    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $complemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $grauImportance
     */
    public function setGrauImportance($grauImportance)
    {
        $this->grauImportance = $grauImportance;
    }

    /**
     * @return mixed
     */
    public function getGrauImportance()
    {
        return $this->grauImportance;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }


} 