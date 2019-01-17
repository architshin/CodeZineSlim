<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App as App;

require_once("../vendor/autoload.php");

$app = new App();
$app->get("/hello",
	function(Request $request, Response $response, array $args): void
	{
		print("<h1>Hello World!</h1>");
	}
);
$app->post("/helloPost",
	function(Request $request, Response $response, array $args): void
	{
		print("<h1>POSTメソッドでこんにちは!</h1>");
	}
);
$app->run();