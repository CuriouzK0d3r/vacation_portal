<?php

require_once "Database.php";

class Users
{
    private $users;
    private static $instance = null;

    private function __construct()
    {
        $database = Database::getInstance();
        $this->users = $database->select("SELECT * FROM user", array());
    }

    /**
     * Implements the singleton design pattern. Guarantees that there is only one active instance of the Database at runtime.
     * @return Database|null
     */
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Users();
        }

        return self::$instance;
    }

    public function getUserByEmail($email)
    {
        $database = Database::getInstance();
        return $database->select("SELECT * FROM user WHERE email=:email", array(":email" => $email));;
    }

    public function updateUser($id, $firstname, $lastname, $email, $type)
    {
        $database = Database::getInstance();
        print_r($id);
        return $database->insert("UPDATE user SET first_name='{$firstname}', last_name='{$lastname}', email='{$email}', type='{$type}' WHERE id='{$id}' ", array());; // Dangerous! Possible SQLi.
    }

    public function getAllUsers()
    {
        return $this->users;
    }

    public function addUser($fname, $lname, $email, $pass, $type) {
        $database = Database::getInstance();
        $hashed  = hash('sha256', $pass);;
        try {
            $database->insert("INSERT INTO user (first_name, last_name, password_hash, email, type) VALUES ('{$fname}', '{$lname}', '{$hashed}', '{$email}', '{$type}');",
                array( )); // Dangerous! Possible SQLi.
        } catch (Exception $e) {
            print $e;
        }
    }
}
