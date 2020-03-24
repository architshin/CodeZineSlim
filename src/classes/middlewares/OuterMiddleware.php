<?php
namespace CodeZineSlim\FirstSlim\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class OuterMiddleware implements MiddlewareInterface
{
	public function process(Request $request, RequestHandlerInterface $handler): Response
	{
		print("OuterMiddlewareのhandle()の前の処理<br>");
		$response = $handler->handle($request);
		print("OuterMiddlewareのhandle()の後の処理<br>");
		return $response;
	}
}
