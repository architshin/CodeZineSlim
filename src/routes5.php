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

$app->any("/no5/helloTwigWithContainer2",
	function(Request $request, Response $response, array $args): Response
	{
		$view = $this["view"];
		return $view->render($response, "hello.html");
	}
);

$app->any("/no5/helloTwigWithContainer3",
	function(Request $request, Response $response, array $args): Response
	{
		$view = $this->view;
		return $view->render($response, "hello.html");
	}
);

$app->any("/no5/writeToLog",
	function(Request $request, Response $response, array $args): void
	{
		$logger = $this->get("logger");
		$logger->info("ログに書き出しました。");
		print("<h1>ログへの書き出し実験</h1>");
	}
);
