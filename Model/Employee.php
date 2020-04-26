<?php

require_once "Model/Database.php";

class Employee{
    private $email;
    private $password_hashed;
    private $first_name;
    private $last_lame;

    /**
     * Employee constructor.
     * @param $email
     * @param $password
     */
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password_hashed = hash('sha256', $password);
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $username
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPasswordHashed() {
        return $this->password_hashed;
    }

    /**
     * @param mixed $password
     */
    public function setPasswordHashed($password) {
        $this->password_hashed = hash('sha256', $password);
    }

    public function processLogin() {
        $database = Database::getInstance();
        return $database->select("SELECT COUNT(*) as cnt FROM user WHERE email=:email AND password_hash=:passw ;", array(":email" => $this->email, ":passw" => $this->password_hashed))[0]['cnt'] == '1';
    }
}
