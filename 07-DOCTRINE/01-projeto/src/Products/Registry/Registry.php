<?php

namespace Products\Registry;

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
            throw new \InvalidArgumentException("There are no registered value with the index {$index}!");
        }
        return static::$values[$index];
    } 
}
