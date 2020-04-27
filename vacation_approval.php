<?php
session_start();
if (!isset($_SESSION['loggedin']) || !isset($_GET['app_id']) || !isset($_GET['status']) || ($_SESSION['type'] != "admin") ) {
    header("Location: ./index.php");
} else {
    if ( $_GET['status'] == 'approved' || $_GET['status'] == 'rejected' ) {
        require_once "Model/Applications.php";

        Applications::getInstance()->updateApplication($_GET['app_id'], $_GET['status']);
        $appl = Applications::getInstance()->getApplicationsById($_GET['app_id'])[0];
        $employee_mail = $appl['email'];

        $mail = "Dear employee, your supervisor has {$_GET['status']} your application submitted on {$appl['date_submitted']}.";
        $from = "admin@vacations.com";
        $to = $employee_mail;
        $subject = "Vacation Application";
        $headers = "From:" . $from;
        mail($to, $subject, $mail_body, $headers);
    }
    header("Location: ./admin_portal.php");
    exit();
}