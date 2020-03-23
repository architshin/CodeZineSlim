<?php
use CodeZineSlim\FirstSlim\controllers\Chap8Controller;
use CodeZineSlim\FirstSlim\middlewares\BeforeHelloMiddleware;
use CodeZineSlim\FirstSlim\middlewares\AfterHelloMiddleware;

$app->any("/no8/withBeforeMiddleware", Chap8Controller::class.":mainRequest")->add(new BeforeHelloMiddleware());
$app->any("/no8/withAfterMiddleware", Chap8Controller::class.":mainRequest")->add(new AfterHelloMiddleware());
