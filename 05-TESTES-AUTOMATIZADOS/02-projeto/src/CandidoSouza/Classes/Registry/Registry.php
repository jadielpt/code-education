<?php
/**
 * @author Candido Souza
 * Date: 26/09/14
 * 02 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Registry;

class Registry 
{
    protected static $values;


    static function set($index, $valor)
    {
        static::$values[$index] = $valor;
        
    }
    
    static function get($index)
    {
        if(!isset(static::$values[$index])) {
            throw new \InvalidArgumentException("Não há valor cadastrado com o indice {$index}");
        }
        return static::$values[$index];
    } 
    
}
