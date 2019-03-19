<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App as App;

$app->any("/no4/getDataByJSON/{id}",
	function(Request $request, Response $response, array $args): Response
	{
		$id = $args["id"];
		$jsonArray =["id" => $id, "name" => "田中和彦", "age" => 26];
		return $response->withJson($jsonArray);
	}
);
