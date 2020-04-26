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
 require_once 
?>

<div class="container">
    Past Applications
    <ul class="list-group">
        <li class="list-group-item"></li>
    </ul>
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