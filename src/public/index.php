<?php
use Slim\Factory\AppFactory;
// use Slim\Views\Twig;
// use Monolog\Logger;
// use Monolog\Handler\StreamHandler;
// use Monolog\Handler\FirePHPHandler;

require_once("../vendor/autoload.php");

$app = AppFactory::create();

// $container = $app->getContainer();
// $container["view"] = function($container)
// {
// 	$view = new Twig("../templates");
// 	return $view;
// };
// $container["logger"] = function($container)
// {
// 	$logger = new Logger("firstslim");
// 	$fileHandler = new StreamHandler("../../logs/app.log");
// 	$logger->pushHandler($fileHandler);
// 	return $logger;
// };

$app->setBasePath("/firstslim/src/public");
require_once("../routes.php");
// require_once("../routes4.php");
// require_once("../routes5.php");
// require_once("../routes6.php");

$app->run();
