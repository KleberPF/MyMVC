<?php

namespace app\core;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public static function createUserSession($user)
    {
        $_SESSION["id"] = $user->id;
        $_SESSION["username"] = $user->username;
    }

    public static function isLoggedIn(): bool
    {
        return isset($_SESSION["id"]);
    }

    public static function logout()
    {
        unset($_SESSION["id"]);
        unset($_SESSION["username"]);
    }
}
