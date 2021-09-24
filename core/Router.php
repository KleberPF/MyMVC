<?php

namespace app\core;

use app\core\exception\NotFoundException;

class Router
{
    protected array $routes = [];

    public function get($path, $renderData): void
    {
        $this->routes["get"][$path] = $renderData;
    }

    public function post($path, $renderData): void
    {
        $this->routes["post"][$path] = $renderData;
    }

    public function resolve(): void
    {
        $method = Request::method();
        $path = Request::path();
        $renderData = $this->routes[$method][$path] ?? false;

        if ($renderData === false) {
            Response::setStatusCode(404);
            throw new NotFoundException();
        }

        $controller = $renderData["controller"];
        $callback = $renderData["callback"];

        call_user_func([$controller, $callback]);
    }
}