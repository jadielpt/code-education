<?php
/**
 * @author Candido Souza
 * Date: 10/09/14
 * 04 - Projeto | Módulo 04 - Design Patterns | Estudos Potal Code Education
 * Linguagem: php
 */
namespace CandidoSouza\Classes\DataBases;

class DBConn 
{
    public function __construct() 
    {
        $this->conn = new \PDO("sqlite:select.db");
        return $this->conn;
    }
}
