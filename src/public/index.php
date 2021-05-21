<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use CodeZineSlim\FirstSlim\exceptions\CustomErrorRenderer;

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

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(false, true, true);
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->registerErrorRenderer("text/html", CustomErrorRenderer::class);

$app->setBasePath("/firstslim/src/public");
require_once("../routes.php");
require_once("../routes4.php");
require_once("../routes5.php");
require_once("../routes6.php");
require_once("../routes8.php");

$app->run();
