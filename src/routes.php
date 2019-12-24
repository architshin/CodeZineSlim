<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App as App;
use Slim\Routing\RouteCollectorProxy;

$app->get("/hello",
	function(Request $request, Response $response, array $args): Response {
		print("<h1>Hello World!</h1>");
		return $response;
	}
);
$app->post("/helloPost",
	function(Request $request, Response $response, array $args): Response {
		print("<h1>POSTメソッドでこんにちは!</h1>");
		return $response;
	}
);
$app->any("/helloAny",
	function(Request $request, Response $response, array $args): Response {
		$method = $request->getMethod();
		print("<h1>{$method}でメソッドでこんにちは!</h1>");
		return $response;
	}
);
$app->map(["POST", "GET"], "/helloMap",
	function(Request $request, Response $response, array $args): Response {
		print("<h1>POSTまたはGETメソッドでこんにちは!</h1>");
		return $response;
	}
);
$app->get("/showDetail/{id}",
	function(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		print("<h1>IDが{$id}の詳細です!</h1>");
		return $response;
	}
);

$app->group("/members", function(RouteCollectorProxy $group): void {
	$group->any("/showList", 
		function(Request $request, Response $response, array $args): Response {
			print("<h1>/membersグループの/showListです。</h1>");
			return $response;
		}
	);
	$group->any("/entry", 
		function(Request $request, Response $response, array $args): Response {
			print("<h1>/membersグループの/entryです。</h1>");
			return $response;
		}
	);
	$group->any("/showDetail", 
		function(Request $request, Response $response, array $args): Response {
			print("<h1>/membersグループの/showDetailです。</h1>");
			return $response;
		}
	);
});

$app->redirect("/google", "https://www.google.com/");
