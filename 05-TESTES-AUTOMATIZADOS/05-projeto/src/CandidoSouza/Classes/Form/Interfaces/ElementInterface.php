<?php

/**
 * @author Candido Souza
 * Date: 14/10/14
 * 05 - Projeto | Módulo 05 - Testes Automatizados | Estudos Potal Code Education
 * Linguagem: php
 */

namespace CandidoSouza\Classes\Form\Interfaces;

interface ElementInterface
{
    public function open();
    
    public function close();
    
    public function render();
}
