<?php
/**
 * @author Candido Souza
 * Date: 28/10/14
 * 02 - Project | Module 06 - APIs and Silex | Portal Studies Education Code
 * Programming language: PHP OO
 * Framework: Micro-framework Sílex
 * Testing: PHPUnit
 * Testing Graphics: phpunit-selenium
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
//ini_set("log_errors", 1);
//ini_set("error_log", "../errors.log");
date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../vendor/autoload.php';

// Silex
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

$app = new Application();

$app['debug'] = true;

$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../src/APIsSilex/Views'
]);
//$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
