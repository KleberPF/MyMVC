<?php

use app\controllers\SiteController;
use app\core\Application;

require __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get("/", [
    "controller" => SiteController::class,
    "callback" => "home"
]);
$app->router->get("/contact", [
    "controller" => SiteController::class,
    "callback" => "contact"
]);

$app->run();