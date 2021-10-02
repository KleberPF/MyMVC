<?php

use app\controllers\AuthController;
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
$app->router->get("/register", [
    "controller" => AuthController::class,
    "callback" => "register"
]);
$app->router->post("/register", [
    "controller" => AuthController::class,
    "callback" => "register"
]);
$app->router->get("/login", [
    "controller" => AuthController::class,
    "callback" => "login"
]);
$app->router->post("/login", [
    "controller" => AuthController::class,
    "callback" => "login"
]);
$app->router->get("/profile", [
    "controller" => AuthController::class,
    "callback" => "profile"
]);
$app->router->get("/logout", [
    "controller" => AuthController::class,
    "callback" => "logout"
]);

$app->run();
