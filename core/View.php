<?php

namespace app\core;

class View
{
    private static function getLayout(string $layoutName, $params): string
    {
        // desconstruct params as separate variables
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layoutName.php";
        return ob_get_clean();
    }

    private static function getContent(string $viewName, $params): string
    {
        // desconstruct params as separate variables
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$viewName.php";
        return ob_get_clean();
    }

    public static function renderView(string $layoutName, string $viewName, $params = []): void
    {
        $layout = View::getLayout($layoutName, $params);
        $content = View::getContent($viewName, $params);
        echo str_replace("[content]", $content, $layout);
    }

    public static function renderPartial(string $partialName, $params = []): void
    {
        // desconstruct params as separate variables
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/partials/$partialName.php";
        echo ob_get_clean();
    }
}