<?php
use Slim\App as App;
use Slim\Views\Twig;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

require_once("../vendor/autoload.php");

$app = new App();

$container = $app->getContainer();
$container["view"] = function($container)
{
	$view = new Twig("../templates");
	return $view;
};
$container["logger"] = function($container)
{
	$logger = new Logger("firstslim");
	$fileHandler = new StreamHandler("../../logs/app.log");
	$logger->pushHandler($fileHandler);
	return $logger;
};

require_once("../routes.php");
require_once("../routes4.php");
require_once("../routes5.php");

$app->run();
