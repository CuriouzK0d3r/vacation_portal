<html>
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/app.css" />
</head>
<body>
<div class="jumbotron text-center">
    <h1>Welcome to *Epignosis* Vacation Portal</h1>
    <p>Please login to apply for vacation</p>
</div>

<div class="container">

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img width="10" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/User_font_awesome.svg" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form action="login.php" method="post" id="frmLogin" name="frmLogin" onSubmit="return validate();">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Email">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <div id="formFooter">
                <span class="error" >
                <?php
                session_start();

                if (isset($_SESSION['loggedin']) && isset($_SESSION['type'])) {
                    if ($_SESSION['type'] == 'admin')
                        header('location: ./admin_portal.php');
                    else
                        header('location: ./vacations.php');
                }

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