<?php
use Slim\App as App;
use \Slim\Views\Twig;

require_once("../vendor/autoload.php");

$app = new App();

$container = $app->getContainer();
$container["view"] = function($container)
{
	$view = new Twig("../templates");
	return $view;
};

require_once("../routes.php");
require_once("../routes4.php");
require_once("../routes5.php");

$app->run();
