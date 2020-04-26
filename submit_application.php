<?php
session_start();
require_once "Model/Applications.php";

$past_appls = Applications::getInstance()->addApplication($_POST['datefrom'], $_POST['dateto'], $_POST['reason'], $_SESSION['email']);

$mail_body = "
“Dear supervisor, employee {3} requested for some time off, starting on {$_POST['datefrom']} and
ending on {$_POST['dateto']}, stating the reason:
{$_POST['reason']}
";

header('application_form.php');
exit();