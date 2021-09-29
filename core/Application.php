<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Database $database;

    public function __construct(string $rootDir)
    {
        Application::$ROOT_DIR = $rootDir;
        $this->router = new Router();
        $this->database = new Database();
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            Response::setStatusCode($e->getCode());
            View::renderView("main", "404");
            die();
        }
    }
}