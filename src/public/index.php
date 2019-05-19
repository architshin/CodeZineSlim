<?php
use Slim\App as App;

require_once("../vendor/autoload.php");

$app = new App();

require_once("../routes.php");
require_once("../routes4.php");

$app->run();
