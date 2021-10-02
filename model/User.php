<?php

namespace app\model;

use app\core\Database;

class User
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data)
    {
        // query to add a new user
        //$this->db->query("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");
        $this->db->query("INSERT INTO users (username, password) VALUES(:username, :password)");

        foreach ($data as $key => $field) {
            $this->db->bind(":$key", $field->data);
        }

        // execute query
        return $this->db->execute();
    }

    public function login(string $username, string $password)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(":username", $username);

        $row = $this->db->row();
        $hashedPassword = $row->password;

        // check if password is correct
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}
