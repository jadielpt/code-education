<?php
/**
 * @author Candido Souza
 * Date: 18/11/14
 * 01 - Project | Module 07 - Doctrine and Silex | Portal Studies Education Code
 * Programming language: PHP OO
 * Framework: Micro-framework Sílex
 * Template Engine: Twig
 * Doctrine ORM
 * Testing: PHPUnit
 * Testing Graphics: phpunit-selenium
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
//ini_set("log_errors", 1);
//ini_set("error_log", "../errors.log");
date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../vendor/autoload.php';

// Doctrine
use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\EventManager,
    Doctrine\ORM\Events,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\Mapping\Driver\AnnotationDriver,
    Doctrine\Common\Cache\ArrayCache as Cache,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\Common\Annotations\CachedReader,
    Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain,
    Doctrine\Common\ClassLoader;

$cache = new Cache;
$annotationReader = new AnnotationReader;

$cachedAnnotationReader = new CachedReader(
    $annotationReader,
    $cache
);

$annotationDriver = new AnnotationDriver(
    $cachedAnnotationReader,
    array(__DIR__ . DIRECTORY_SEPARATOR . '../src')
);

$driverChain = new MappingDriverChain();
$driverChain->addDriver($annotationDriver,'Products');

$config = new Configuration;
$config->setProxyDir('/tmp');
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true);
$config->setMetadataDriverImpl($driverChain);
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

AnnotationRegistry::registerFile(__DIR__. DIRECTORY_SEPARATOR . '../vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php');

$evm = new EventManager();
$em = EntityManager::create(
    array(
        'driver'  => 'pdo_mysql',
        'host'    => '127.0.0.1',
        'port'    => '3306',
        'user'    => 'root',
        'password'  => 'root',
        'dbname'  => 'products',
    ),
    $config,
    $evm
);

// Silex
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

$app = new Application();

$app['debug'] = true;

$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../src/Products/Views'
]);

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());