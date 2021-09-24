<?php

namespace app\core;

class View
{
    private static function renderLayout(string $layoutName): string
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layoutName.php";
        return ob_get_clean();
    }

    private static function renderContent(string $viewName): string
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$viewName.php";
        return ob_get_clean();
    }

    public static function renderView(string $layoutName, string $viewName, $params = []): void
    {
        $layout = View::renderLayout($layoutName);
        $content = View::renderContent($viewName);
        echo str_replace("[content]", $content, $layout);
    }
}