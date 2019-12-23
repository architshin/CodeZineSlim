<?php
use CodeZineSlim\FirstSlim\controllers\no6\HelloController;
use CodeZineSlim\FirstSlim\controllers\no6\Chap6Controller;

$app->any("/no6/helloWithInvokableController", HelloController::class);
$app->any("/no6/helloNatsume", Chap6Controller::class.":helloNatsume");
$app->any("/no6/helloAkutagawa", Chap6Controller::class.":helloAkutagawa");
