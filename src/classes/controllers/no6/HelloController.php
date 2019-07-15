<?php
namespace CodeZineSlim\FirstSlim\controllers\no6;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;


class HelloController
{
	//Slimのコンテナインスタンスを格納するプロパティ。
	private $container;
	//コンストラクタ。
	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
	//実際に実行されるメソッド。
	public function __invoke(Request $request, Response $response, array $args): Response
	{
		$view = $this->container->get("view");
		return $view->render($response, "hello.html");
	}
}
