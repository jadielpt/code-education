<?php
/*
* @author Candido Souza
* Projeto: Estudos Potal Code Education - Módulo 03 Php Foundation
* Arquivo: fixture.php
* Linguagem: php
* Data: 22/07/2014
 */
session_start();
unset($_SESSION['loginUser']);
header('Location: ../index.php');