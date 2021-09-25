<?php

namespace app\controllers;

use app\core\View;

class SiteController
{
    public static function home()
    {
        $params = [
            "title" => "Home Page",
            "styles" => ["home"],
            "scripts" => ["home"],
        ];
        View::renderView("main", "home", $params);
    }

    public static function contact()
    {
        $params = [
            "title" => "Contact Page",
            "styles" => [],
            "scripts" => [],
        ];
        View::renderView("main", "contact", $params);
    }
}