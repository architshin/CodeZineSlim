<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

require_once("../vendor/autoload.php");

$container = new Container();
$container->set("view", function($container) {
	$view = Twig::create("../templates");
	return $view;
});
$container->set("logger", function($container) {
	$logger = new Logger("firstslim");
	$fileHandler = new StreamHandler("../../logs/app.log");
	$logger->pushHandler($fileHandler);
	return $logger;
});
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->setBasePath("/firstslim/src/public");
require_once("../routes.php");
require_once("../routes4.php");
require_once("../routes5.php");
require_once("../routes6.php");

$app->run();
