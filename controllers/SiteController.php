<?php

namespace app\controllers;

use app\core\View;

class SiteController
{
    public static function home()
    {
        View::renderView("main", "home");
    }

    public static function contact()
    {
        View::renderView("main", "contact");
    }
}