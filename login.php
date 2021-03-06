<?php

require_once "Model/Employee.php";

if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    session_start();
    $email = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    $employee = new Employee($email, $password);
    $isLoggedIn = $employee->processLogin();



    if (!$isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
        header("Location: ./index.php");
        exit();
    } else {
        $_SESSION["type"] = $employee->getType();
        $_SESSION["email"] = $email;
        $_SESSION['loggedin'] = true;
        $_SESSION['fname'] = $employee->getFirstName();
        $_SESSION['lname'] = $employee->getLastName();

        if ($_SESSION['type'] == 'admin')
            header('location: ./admin_portal.php');
        else
            header('location: ./vacations.php');
        exit();
    }
} else {
    $_SESSION["errorMessage"] = "Invalid Credentials";
    header("Location: ./index.php");
}
