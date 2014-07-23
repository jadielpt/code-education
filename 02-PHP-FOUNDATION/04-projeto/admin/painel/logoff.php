<?php
/*
 * @author Candido Souza
 * Projeto: Estudos Potal Code Education - Módulo 04 Php Foundation
 * Arquivo: logoff.php
 * Linguagem: php
 * Data: 23/07/2014
 */

// deloga o usuário
session_start();
unset($_SESSION['loginUser']);
header('Location: ../index.php');