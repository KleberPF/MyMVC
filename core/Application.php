<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;

    public function __construct(string $rootDir)
    {
        Application::$ROOT_DIR = $rootDir;
        $this->router = new Router();
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            Response::setStatusCode($e->getCode());
            //echo View::renderView("main", "404");
            View::renderView("main", "404");
            die();
        }
    }
}