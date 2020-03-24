<?php
use CodeZineSlim\FirstSlim\controllers\Chap8Controller;
use CodeZineSlim\FirstSlim\middlewares\BeforeHelloMiddleware;
use CodeZineSlim\FirstSlim\middlewares\AfterHelloMiddleware;
use CodeZineSlim\FirstSlim\middlewares\InnerMiddleware;
use CodeZineSlim\FirstSlim\middlewares\OuterMiddleware;

$app->any("/no8/withBeforeMiddleware", Chap8Controller::class.":mainRequest")->add(new BeforeHelloMiddleware());
$app->any("/no8/withAfterMiddleware", Chap8Controller::class.":mainRequest")->add(new AfterHelloMiddleware());
$app->any("/no8/withInnerMiddleware", Chap8Controller::class.":mainRequest")->add(new InnerMiddleware());
$app->any("/no8/withDoubleMiddleware", Chap8Controller::class.":mainRequest")->add(new InnerMiddleware())->add(new OuterMiddleware());
