<?php

namespace app\controllers;

use app\core\exception\ForbiddenException;
use app\core\Response;
use app\core\Session;
use app\core\View;
use app\model\Field;
use app\model\User;

class AuthController
{
    public static function register()
    {
        $data = [
            "username" => new Field("username", "text", $_POST["username"] ?? "", "Username", ["required", ["min", 6], ["max", 16]]),
            "password" => new Field("password", "password", $_POST["password"] ?? "", "Password", ["required", ["min", 8]]),
        ];
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // trim input fields
            foreach ($data as $field) {
                $field->data = trim($field->data);
            }

            foreach ($data as $key => $field) {
                $error = $field->validate()[0] ?? null;
                if (!is_null($error)) {
                    $errors[$key] = $error;
                }
            }

            if (empty($errors)) {
                // hash password
                $data["password"]->data = password_hash($data["password"]->data, PASSWORD_DEFAULT);

                $user = new User();
                if ($user->register($data)) {
                    header("Location: " . URLROOT);
                } else {
                    die("Something went wrong");
                }
            }
        }

        $params = [
            "title" => "Register Page",
            "styles" => [],
            "scripts" => [],
            "data" => $data,
            "errors" => $errors,
        ];
        View::renderView("main", "register", $params);
    }

    public static function login()
    {
        $data = [
            "username" => new Field("username", "text", $_POST["username"] ?? "", "Username", ["required", ["min", 6], ["max", 16]]),
            "password" => new Field("password", "password", $_POST["password"] ?? "", "Password", ["required", ["min", 8]]),
        ];
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // trim input fields
            foreach ($data as $field) {
                $field->data = trim($field->data);
            }

            foreach ($data as $key => $field) {
                $error = $field->validate()[0] ?? null;
                if (!is_null($error)) {
                    $errors[$key] = $error;
                }
            }

            if (empty($errors)) {
                $user = new User(); // need to change this later
                $loggedInUser = $user->login($data["username"]->data, $data["password"]->data);

                if ($loggedInUser) {
                    Session::createUserSession($loggedInUser);
                    // redirect to home
                    header("Location: " . URLROOT);
                } else {
                    $errors["password"] = "Wrong password, try again.";
                }
            }
        }

        $params = [
            "title" => "Login Page",
            "styles" => [],
            "scripts" => [],
            "data" => $data,
            "errors" => $errors,
        ];
        View::renderView("main", "login", $params);
    }

    public static function profile()
    {
        if (Session::isLoggedIn()) {
            View::renderView("main", "profile");
        } else {
            throw new ForbiddenException();
        }
    }

    public static function logout()
    {
        Session::logout();
        header("Location: " . URLROOT);
    }
}
