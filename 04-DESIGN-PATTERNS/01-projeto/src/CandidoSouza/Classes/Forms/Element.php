<?php
/**
 *
 * User: candidosouza
 * Date: 26/08/14
 * 01 - Projeto Design Patterns | Estudos Potal Code Education - Módulo 03 Php Orientado a Objetos
 * @author Candido Souza
 * Arquivo: Element.php
 * Linguagem: php
 * fonte: Livro PHP Programando com Orientação a Objetos(Pablo Dall'Oglio, Capitulo 06 - pag: 377-457), com modificações para adequação ao projeto
 *
 */

namespace CandidoSouza\Classes\Forms;


class Element
{
    private $name;
    private $properties;
    protected $elementsFilho;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function add($filho)
    {
        $this->elementsFilho[] = $filho;
    }

    private function open()
    {
        echo "<{$this->name}";
        if ($this->properties){
            foreach ($this->properties as $name=>$value){
                echo " {$name}=\"{$value}\"";
            }
        }
        echo '>';
    }

    public function render()
    {
        $this->open();
        echo "\n";
        if ($this->elementsFilho){
            foreach ($this->elementsFilho as $filho){
                if (is_object($filho)){
                    $filho->render();
                }elseif ((is_string($filho)) or (is_numeric($filho))){
                    echo $filho;
                }
            }
            $this->close();
        }
    }
    protected  function close()
    {
        echo "</{$this->name}>\n";
    }

} 