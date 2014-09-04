<?php
/**
 * Created by PhpStorm.
 * User: candidosouza
 * Date: 28/08/14
 * Time: 18:51
 */

namespace CandidoSouza\Classes\Forms\Utils;
use CandidoSouza\Classes\Forms\Interfaces\ElementInterfaces;


class Element
{
    public $tag;
    public  $properties;
    protected $elementsFilho;


    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    private function open()
    {
        echo "\n<{$this->tag}";
        if ($this->properties){
            foreach ($this->properties as $name=>$value){
                echo " {$name}=\"{$value}\"";
            }
        }
        echo '>';

    }

    public function close()
    {
        echo "</{$this->tag}>\n";
    }

    public function render()
    {
        $this->open();
    }

} 