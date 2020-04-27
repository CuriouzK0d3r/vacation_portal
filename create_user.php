<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ./index.php');
}
require_once "Model/Users.php";

$action = $_GET['action'];

if ($action == 'create') {
    Users::getInstance()->addUser($_POST['firstname'], $_POST['lastname'],
        $_POST['email'], $_POST['password'], $_POST['type']);
} else if ($action == 'update') {
    Users::getInstance()->updateUser($_GET['uid'], $_POST['firstname'], $_POST['lastname'],
        $_POST['email'], $_POST['type']);
}
header('Location: ./admin_portal.php');
exit();