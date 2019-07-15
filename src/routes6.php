<?php
use CodeZineSlim\FirstSlim\controllers\no6\HelloController;

$app->any("/no6/helloWithInvokableController", HelloController::class);
