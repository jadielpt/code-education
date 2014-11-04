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

// Doctrine
use Doctrine\ORM\Tools\Setup,
        Doctrine\ORM\EntityManager,
        Doctrine\ORM\Events,
        Doctrine\ORM\Configuration,
        Doctrine\ORM\Mapping\Driver\AnnotationDriver,
        Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain,
        Doctrine\Common\EventManage,
        Doctrine\Common\Cache\ArrayCache as Cache,
        Doctrine\Common\Annotations\AnnotationReader,
        Doctrine\Common\Annotations\AnnotationRegistry,
        Doctrine\Common\Annotations\CachedReader,
        Doctrine\Common\ClassLoader,
        Doctrine\Common\EventManager,
        Gedmo\DoctrineExtensions,
        Gedmo\Sluggable\SluggableListener;
        
$cache = new Cache;
$annotationReader = new AnnotationReader();
$cacheAnnotationReader = new CachedReader(
        $annotationReader, 
        $cache
        );

$driverChain = new MappingDriverChain();

DoctrineExtensions::registerAbstractMappingIntoDriverChainORM(
        $driverChain, 
        $cacheAnnotationReader
        );

$annotationDrive = new AnnotationDriver(
        $cacheAnnotationReader,
        [__DIR__ . DIRECTORY_SEPARATOR . '../src']
        );

$driverChain->addDriver($annotationDrive, 'ESilex');
        
$config = new Configuration();
$config->setProxyDir('/tmp');
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true);
$config->setMetadataDriverImpl($driverChain);
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

AnnotationRegistry::registerFile(__DIR__. DIRECTORY_SEPARATOR . '../vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php');

$evm = new EventManager();

$sluggableListener = new SluggableListener();
$sluggableListener->setAnnotationReader($cacheAnnotationReader);
$evm->addEventSubscriber($sluggableListener);

$em = EntityManager::create(
            [
                'driver'     =>  'pdo_mysql',
                'host'      =>  'localhost',
                'port'      =>  '3306',
                'user'      =>  'root',
                'password'  =>  'root',
                'dbname'    =>  'exemplo'
            ],
            $config,
            $evm
        );

// Silex
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

$app = new Application();

$app['debug'] = true;
