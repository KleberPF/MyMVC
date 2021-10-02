<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Session $session;

    public function __construct(string $rootDir)
    {
        Application::$ROOT_DIR = $rootDir;
        $this->router = new Router();
        $this->session = new Session();
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $code = $e->getCode();
            Response::setStatusCode($code);
            // hack?
            View::renderView("main", "$code");
            die();
        }
    }
}
