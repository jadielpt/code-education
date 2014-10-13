<?php

/**
 * @author Candido Souza
 * Date: 08/10/14
 * 04 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Interfaces;
use CandidoSouza\Classes\Form\Util\Element;

interface TagInterface 
{
    public function createField(Element $element);
    
    public function close(Element $element);
}
