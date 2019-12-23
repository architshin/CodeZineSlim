<?php
namespace CodeZineSlim\FirstSlim\controllers\no6;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;

class Chap6Controller
{
	private $container;
	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
	public function helloNatsume(Request $request, Response $response, array $args): Response
	{
		$assign["name"] = "夏目";
		$view = $this->container->get("view");
		return $view->render($response, "no4/helloWithVals.html", $assign);

	}	
	public function helloAkutagawa(Request $request, Response $response, array $args): Response
	{
		$assign["name"] = "芥川";
		$view = $this->container->get("view");
		return $view->render($response, "no4/helloWithVals.html", $assign);
	}
}
