<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 01/08/14
 * Time: 17:51
 * 02 - Projeto Tipos de Clientes | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: ClientesPessoasJuridicas.php
 * Linguagem: php
 */

namespace CandidoSouza\Clientes\Types;
use CandidoSouza\Clientes\Interfaces\EndCobrancaInterface;


/**
 * Class ClientesPessoasJuridicas
 * @package CandidoSouza\Clientes\Types;
 */
class ClientesPessoasJuridicas extends Clientes implements EndCobrancaInterface
{
    protected  $fax;

    protected $telContato;
    protected $cobrRua;
    protected $cobrNumero;
    protected $cobrComplemento;
    protected $cobrBairro;
    protected $cobrCep;
    protected $cobrMunicipio;
    protected $cobrUf;

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $telContato
     */
    public function setTelContato($telContato)
    {
        $this->telContato = $telContato;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelContato()
    {
        if($this->telContato == null){
            return $this->getTelefone();
        }else{
            return $this->telContato;

        }
    }

    /**
     * @param mixed $cobrBairro
     */
    public function setCobrBairro($cobrBairro)
    {
        $this->cobrBairro = $cobrBairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrBairro()
    {
        if($this->cobrBairro == null){
            return$this->getBairro();
        }else{
            return $this->cobrBairro;
        }
    }

    /**
     * @param mixed $cobrCep
     */
    public function setCobrCep($cobrCep)
    {
        $this->cobrCep = $cobrCep;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrCep()
    {
        if($this->cobrCep == null){
            return$this->getCep();
        }else{
            return $this->cobrCep;
        }
    }

    /**
     * @param mixed $cobrComplemento
     */
    public function setCobrComplemento($cobrComplemento)
    {
        $this->cobrComplemento = $cobrComplemento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrComplemento()
    {
        if($this->cobrComplemento == null){
            return$this->getComplemento();
        }else{
            return $this->cobrComplemento;
        }
    }

    /**
     * @param mixed $cobrMunicipio
     */
    public function setCobrMunicipio($cobrMunicipio)
    {
        $this->cobrMunicipio = $cobrMunicipio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrMunicipio()
    {
        if($this->cobrMunicipio == null){
            return$this->getMunicipio();
        }else{
            return $this->cobrMunicipio;;
        };
    }

    /**
     * @param mixed $cobrNumero
     */
    public function setCobrNumero($cobrNumero)
    {
        $this->cobrNumero = $cobrNumero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrNumero()
    {
        if($this->cobrNumero == null){
            return$this->getNumero();
        }else{
            return $this->cobrNumero;
        }
    }

    /**
     * @param mixed $cobrRua
     */
    public function setCobrRua($cobrRua)
    {
        $this->cobrRua = $cobrRua;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrRua()
    {
        if($this->cobrRua == null){
            return$this->getRua();
        }else{
            return $this->cobrRua;
        }
    }

    /**
     * @param mixed $cobrUf
     */
    public function setCobrUf($cobrUf)
    {
        $this->cobrUf = $cobrUf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrUf()
    {
        if($this->cobrUf == null){
            return$this->getUf();
        }else{
            return $this->cobrUf;
        }
    }


} 