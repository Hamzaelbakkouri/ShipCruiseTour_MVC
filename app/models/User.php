<?php

class user
{

    private $database;
    public function __construct()
    {
        $this->database = new DB;
    }

    //find user by email
    public function getUserByEmail($email)
    {
        $this->database->query("SELECT * FROM users WHERE Email=:email");
        $this->database->bind(":email", $email);
        $this->database->execute();
        $fetch = $this->database->fetch();

        if ($this->database->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function register($data)
    {
        $this->database->query('INSERT INTO users (name, email, password)VALUES (:name, :email, :password)');

        $this->database->bind(':name', $data['name']);
        $this->database->bind(':email', $data['email']);
        $this->database->bind(':password', $data['password']);

        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->database->query('SELECT * FROM `users` WHERE `email` = :email');
        $this->database->bind(':email', $email);
        $row = $this->database->fetch();
        
        if ($row) {
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }
    }
}
