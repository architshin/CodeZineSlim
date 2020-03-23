<?php
namespace CodeZineSlim\FirstSlim\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Chap8Controller
{
	public function mainRequest(Request $request, Response $response, array $args): Response
	{
		print("ここはメインのリクエスト処理<br>");
		return $response;
	}	
}
