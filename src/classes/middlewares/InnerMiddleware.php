<?php
namespace CodeZineSlim\FirstSlim\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class InnerMiddleware implements MiddlewareInterface
{
	public function process(Request $request, RequestHandlerInterface $handler): Response
	{
		print("InnerMiddlewareのhandle()の前の処理<br>");
		$response = $handler->handle($request);
		print("InnerMiddlewareのhandle()の後の処理<br>");
		return $response;
	}
}
