<?php
namespace CodeZineSlim\FirstSlim\exceptions;

use Throwable;
use Psr\Container\ContainerInterface;
use Slim\Interfaces\ErrorRendererInterface;
use Slim\Error\Renderers\HtmlErrorRenderer;
use Slim\Exception\HttpNotFoundException;

class CustomErrorRenderer implements ErrorRendererInterface
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function __invoke(Throwable $exception, bool $displayErrorDetails): string
	{
		if($displayErrorDetails) {
			$htmlErrorRenderer = new HtmlErrorRenderer();
			$returnHtml = $htmlErrorRenderer($exception, $displayErrorDetails);
		}
		else {
			$twig = $this->container->get("view");
			if($exception instanceof HttpNotFoundException) {
				$returnHtml = $twig->fetch("404.html");
			}
			else {
				$assign["errorMsg"] = "もう一度初めから操作してください。";
				$returnHtml = $twig->fetch("error.html", $assign);
			}
		}
		return $returnHtml;
	}
}
