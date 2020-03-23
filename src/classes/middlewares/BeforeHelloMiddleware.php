<?php
namespace CodeZineSlim\FirstSlim\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BeforeHelloMiddleware implements MiddlewareInterface
{
	public function process(Request $request, RequestHandlerInterface $handler): Response
	{
		print("BeforeHelloMidlewareからHello!<br>");
		$response = $handler->handle($request);
		return $response;
	}
}
