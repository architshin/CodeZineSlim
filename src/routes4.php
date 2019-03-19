<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App as App;
use \Slim\Views\Twig;

$app->any("/no4/getDataByJSON/{id}",
	function(Request $request, Response $response, array $args): Response
	{
		$id = $args["id"];
		$jsonArray =["id" => $id, "name" => "田中和彦", "age" => 26];
		return $response->withJson($jsonArray);
	}
);

$app->any("/no4/helloTwig",
	function(Request $request, Response $response, array $args): Response
	{
		$view = new Twig("../templates");
		return $view->render($response, "hello.html");
	}
);

$app->any("/no4/helloWithVals",
	function(Request $request, Response $response, array $args): Response
	{
		$assign["name"] = "夏目";
		$view = new Twig("../templates");
		return $view->render($response, "no4/helloWithVals.html", $assign);
	}
);

$app->any("/no4/filters",
	function(Request $request, Response $response, array $args): Response
	{
		$assign["msg"] = "こんにちは。\nさようなら。";
		$view = new Twig("../templates");
		return $view->render($response, "no4/filters.html", $assign);
	}
);

$app->any("/no4/ifStatement",
	function(Request $request, Response $response, array $args): Response
	{
		$assign["rand"] = rand(1, 3);
		$view = new Twig("../templates");
		return $view->render($response, "no4/ifStatement.html", $assign);
	}
);

$app->any("/no4/forStatement1",
	function(Request $request, Response $response, array $args): Response
	{
		$view = new Twig("../templates");
		return $view->render($response, "no4/forStatement1.html");
	}
);

$app->any("/no4/forStatement2",
	function(Request $request, Response $response, array $args): Response
	{
		$assign["resultList"] = ["A"=>"田中", "B"=>"中野", "C"=>"野村"];
		$view = new Twig("../templates");
		return $view->render($response, "no4/forStatement2.html", $assign);
	}
);
