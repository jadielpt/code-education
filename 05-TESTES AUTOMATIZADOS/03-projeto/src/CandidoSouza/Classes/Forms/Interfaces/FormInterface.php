<?php
/**
 * @author Candido Souza
 * Date: 01/10/14
 * 03 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Forms\Interfaces;
use CandidoSouza\Classes\Forms\Utils\Element;

interface FormInterface 
{
    public function createField(Element $element);
    
    public function close(Element $element);
}
