<?php
use CodeZineSlim\FirstSlim\controllers\Chap8Controller;
use CodeZineSlim\FirstSlim\middlewares\BeforeHelloMiddleware;

$app->any("/no8/withBeforeMiddleware", Chap8Controller::class.":mainRequest")->add(new BeforeHelloMiddleware());
