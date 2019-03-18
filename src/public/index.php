<?php
use Slim\App as App;

require_once("../vendor/autoload.php");

$app = new App();
require_once("../routes.php");
$app->run();