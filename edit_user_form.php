<html>
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel="stylesheet" href="assets/app.css" />
</head>
<body>
<div class="jumbotron text-center">
    <h1>*Epignosis* Vacation Portal</h1>
    <p>Update User Status</p>
</div>
<div class="text-right" style="margin-right: 70px">
    <a href="./logout.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Log Out</a>
</div>

<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ./index.php');
}
require_once "Model/Users.php";
$user_email = $_GET['email'];
$user = Users::getInstance()->getUserByEmail($user_email)[0];

?>

<div class="container">

    <div class="wrapper fadeInDown">
        <div id="formContent" style="padding-top: 15px">
            <div class="fadeIn first">
                <h3>User Status Page</h3>
            </div>
            <!-- Login Form -->
            <form action="create_user.php?action=update&uid=<? print $user['id']; ?>" method="post" id="formApplication" name="formApplication" onSubmit="return validate();">
                <div class="form-group row">
                    <input style="width: 95%" type="text" id="firstname" class="fadeIn second" name="firstname" value="<? print $user['first_name'];?>" placeholder="First Name">
                </div>
                <div class="form-group row">
                    <input style="width: 95%" type="text" id="lastname" class="fadeIn second" name="lastname" value="<? print $user['last_name'];?>" placeholder="Last Name">
                </div>
                <div class="form-group row">
                    <input style="width: 95%" type="text" id="email" class="fadeIn second" name="email" value="<? print $user['email'];?>" placeholder="Email">
                </div>
                <div class="form-group row">
                    <select name="type" style="width: 95%" class="form-control" id="type" >
                        <option value="" disabled>Type</option>
                        <option value="employee" <? print $user['type'] == 'employee' ? print "selected": print '';?>>Employee</option>
                        <option value="admin" <? print $user['type'] == 'admin' ? print "selected": print '';?>>Admin</option>
                    </select>

                </div>
                <input type="submit" class=" fourth" value="Update">
                <a href="./admin_portal.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Go Back</a>
            </form>

            <div id="formFooter">
                <span class="error" >
                <?php
                if(isset($_SESSION["errorMessage"])) {
                    ?>
                    <?php  echo $_SESSION["errorMessage"]; ?>
                    <?php
                    unset($_SESSION["errorMessage"]);
                }
                ?>
                    </span>
            </div>

        </div>
    </div>
</div>
<script>
    const validate = ()  => {
        const firstname = document.getElementById("firstname").value;
        const lastname = document.getElementById("lastname").value;
        const email = document.getElementById("email").value;
        const pass = document.getElementById("password").value;
        const cpass = document.getElementById("cpassword").value;
        const type = document.getElementById("type").value;

        if ( firstname === "" ) {
            document.querySelector('.error').innerHTML = "Input Missing!";
            return false;
        }
        if ( lastname === "" ) {
            document.querySelector('.error').innerHTML = "Input Missing!";
            return false;
        }
        if ( email === "" ) {
            document.querySelector('.error').innerHTML = "Input Missing!";
            return false;
        }
        if ( type === "" ) {
            document.querySelector('.error').innerHTML = "Input Missing!";
            return false;
        }

        if ( cpass != pass ) {
            document.querySelector('.error').innerHTML = "Passwords Mismatch!";
            return false;
        }


        return true;
    }
</script>
</body>
</html>