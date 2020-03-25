<?php
namespace CodeZineSlim\FirstSlim\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AfterHelloMiddleware implements MiddlewareInterface
{
	public function process(Request $request, RequestHandlerInterface $handler): Response
	{
		$response = $handler->handle($request);
		print("AfterHelloMiddlewareからHello!<br>");
		return $response;
	}
}
