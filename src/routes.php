<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App as App;

$app->get("/hello",
	function(Request $request, Response $response, array $args): void
	{
		print("<h1>Hello World!</h1>");
	}
);
$app->post("/helloPost",
	function(Request $request, Response $response, array $args): void
	{
		print("<h1>POSTメソッドでこんにちは!</h1>");
	}
);
$app->any("/helloAny",
	function(Request $request, Response $response, array $args): void
	{
		$method = $request->getMethod();
		print("<h1>{$method}でメソッドでこんにちは!</h1>");
	}
);
$app->map(["POST", "GET"], "/helloMap",
	function(Request $request, Response $response, array $args): void
	{
		print("<h1>POSTまたはGETメソッドでこんにちは!</h1>");
	}
);
$app->get("/showDetail/{id}",
	function(Request $request, Response $response, array $args): void
	{
		$id = $args["id"];
		print("<h1>IDが{$id}の詳細です!</h1>");
	}
);

$app->group("/members", function(App $app): void {
	$app->any("/showList", 
		function(Request $request, Response $response, array $args): void
		{
			print("<h1>/membersグループの/showListです。</h1>");
		}
	);
	$app->any("/entry", 
		function(Request $request, Response $response, array $args): void
		{
			print("<h1>/membersグループの/entryです。</h1>");
		}
	);
	$app->any("/showDetail", 
		function(Request $request, Response $response, array $args): void
		{
			print("<h1>/membersグループの/showDetailです。</h1>");
		}
	);
});

$app->redirect("/google", "https://www.google.com/");
