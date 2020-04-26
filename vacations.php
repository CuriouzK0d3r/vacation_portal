<html>
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/app.css" />
</head>
<body>
<div class="jumbotron text-center">
    <h1>Welcome !</h1>
    <p>You can view the list of past applications or create a new one</p>
</div>

<?php
session_start();
 require_once "Model/Applications.php";

 $past_appls = Applications::getInstance()->getApplicationsForUser($_SESSION["email"]);

?>

<div class="container">
    <h3 style="text-align: center;padding-bottom: 30px">Past Applications</h3>
    <ul class="list-group">
        <div class="row">
            <div class="col" style="font-weight: bold">Date Submitted </div> <div class="col" style="font-weight: bold">Date From</div>
            <div class="col" style="font-weight: bold">Date To</div> <div class="col" style="font-weight: bold">Days Requested</div>  <div class="col" style="font-weight: bold"> Status </div></div></li>
        <?php
        foreach ($past_appls as $app) {
            ?>
            <li class="list-group-item"> <div class="row">
                    <div class="col"><? print $app['date_submitted'] ?></div> <div class="col"><? print $app['date_from'] ?>
                    </div> <div class="col"><? print $app['date_to'] ?></div> <div class="col"><? print $app['days_requested'] ?></div>
                    <div class="col"> <? print $app['status'] ?> </div></li>
 <?php  }
?>

    </ul>
    <a style="margin-top: 30px; width: 50%" href="application_form.php" class="btn btn-primary btn-lg active" role="button" aria-disabled="true">Submit Request</a>
</div>
<script>
    const validate = ()  => {
        const userName = document.getElementById("login").value;
        const password = document.getElementById("password").value;

        if ( userName === "" ) {
            document.querySelector('.error').innerHTML = "Email Missing!";
            return false;
        }
        if ( password === "" ) {
            document.querySelector('.error').innerHTML = "Password Missing!";
            return false;
        }

        return true;
    }
</script>
</body>
</html>