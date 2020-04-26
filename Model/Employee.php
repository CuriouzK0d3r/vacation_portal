<?php


class Employee extends User{
    private $username;
    private $password_hashed;
    private $first_name;
    private $last_lame;

    /**
     * Employee constructor.
     * @param $email
     * @param $password
     */
    public function __construct($email, $password) {
        $this->username = $email;
        $this->password_hashed = hash('sha256', $password);
        print $this->password_hashed;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {
        $this->username = $username;
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
        return false;
        return true;
    }
}