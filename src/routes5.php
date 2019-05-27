<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\Views\Twig;

function getTwigInstance()
{
	$view = new Twig("../templates");
	return $view;
}

$app->any("/no5/helloTwigWithFunc",
	function(Request $request, Response $response, array $args): Response
	{
		$view = getTwigInstance();
		return $view->render($response, "hello.html");
	}
);

$app->any("/no5/helloTwigWithContainer",
	function(Request $request, Response $response, array $args): Response
	{
		$view = $this->get("view");
		return $view->render($response, "hello.html");
	}
);
