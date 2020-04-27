<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ./index.php');
}

require_once "Model/Applications.php";

$id = Applications::getInstance()->addApplication($_POST['datefrom'], $_POST['dateto'], $_POST['reason'], $_SESSION['email']);

$mail_body = "
Dear supervisor, employee {$_SESSION['fname']} {$_SESSION['lname']} requested for some time off, starting on {$_POST['datefrom']} and ending on {$_POST['dateto']}, stating the reason:
{$_POST['reason']}.

<a href='http://localhost/vacation_portal/vacation_approval.php?app_id={$id}&status=approved'>approve</a> - <a href='http://localhost/vacation_portal/vacation_approval.php?app_id={$id}&status=rejected'>reject</a>
";

$from = "admin@vacations.com";
$to = "admin@vacations.com";
$subject = "Vacation Application";
$headers = "From:" . $from;
mail($to, $subject, $mail_body, $headers);
//echo "The email message was sent.";

header('location: ./vacations.php');
exit();
