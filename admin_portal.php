<html>
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/app.css" />
</head>
<body>
<div class="jumbotron text-center">
    <h1>Welcome <?php session_start(); print $_SESSION['fname']; ?> !</h1>
    <p>You can view the list of users or create a new one</p>
</div>
<div class="text-right" style="margin-right: 70px">
    <a href="./logout.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Log Out</a>
</div>
<?php
session_start();

require_once "Model/Users.php";
if (!isset($_SESSION['loggedin'])) {
    header('Location: ./index.php');
}
if ($_SESSION["type"] != "admin")
    header('Location: ./vacations.php');
$users = Users::getInstance()->getAllUsers();

?>

<div class="container">
    <h3 style="text-align: center;padding-bottom: 30px">Users</h3>
    <ul class="list-group">
        <div class="row">
            <div class="col" style="font-weight: bold">First Name </div> <div class="col" style="font-weight: bold">Last Name</div>
            <div class="col" style="font-weight: bold">Email</div> <div class="col" style="font-weight: bold">Type</div></div>
        </li>
        <?php
        foreach ($users as $user) {
            ?>
            <li class="list-group-item"> <div class="row">
                    <div class="col"><? print $user['first_name'] ?></div> <div class="col"><? print $user['last_name'] ?>
                    </div> <div class="col email"><? print $user['email'] ?></div> <div class="col"><? print $user['type'] ?></div>
        <?php  }
        ?>

    </ul>
    <a style="margin-top: 30px; width: 50%" href="create_user_form.php" class="btn btn-primary btn-lg active" role="button" aria-disabled="true">Create User</a>
</div>
<script>
    $(function() {
        $('li').css('cursor', 'pointer')

            .click(function() {
                window.location = "edit_user_form.php?email="+($(this).find('.email').html());
                // window.location = $('li', this).find('.email');
                return false;
            });
    });
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