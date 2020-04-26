<html>
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/app.css" />
</head>
<body>
<div class="jumbotron text-center">
    <h1>*Epignosis* Vacation Portal</h1>
    <p>Submit request for vacations</p>
</div>

<div class="container">

    <div class="wrapper fadeInDown">
        <div id="formContent" style="padding-top: 15px">
            <div class="fadeIn first">
                <h3>Request Form</h3>
            </div>
            <!-- Login Form -->
            <form action="submit_application.php" method="post" id="formApplication" name="formApplication" onSubmit="return validate();">
                <div class="form-group row">
                    <label for="example-date-input" class="col-3 col-form-label">Date From</label>
                    <div class="col-8">
                        <input name="datefrom" class="form-control" type="date" value="2020-01-11" id="datefrom">
                    </div>
                </div>
                <div cla
                <div class="form-group row">
                    <label for="example-date-input" class="col-3 col-form-label">Date To</label>
                    <div class="col-8">
                        <input name="dateto" class="form-control" type="date" value="2020-01-11" id="dateto">
                    </div>
                </div>
                <div class="form-group row">
                    <div style="padding-left: 30px" class=" col-3">
                        <label for="example-date-input" class="col-form-label">Reason</label>
                    </div>
                    <div class="col-8">
                    <textarea name="reason" id="reason"  class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <input type="submit" class=" fourth" value="Submit">
            </form>

            <div id="formFooter">
                <span class="error" >
                <?php
                session_start();

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
        const date1 = document.getElementById("datefrom").value;
        const date2 = document.getElementById("dateto").value;
        const reason = document.getElementById("reason").value;

        if ( date1 === "" ) {
            document.querySelector('.error').innerHTML = "Date Missing!";
            return false;
        }
        if ( date2 === "" ) {
            document.querySelector('.error').innerHTML = "Date Missing!";
            return false;
        }

        if ( reason === "" ) {
            document.querySelector('.error').innerHTML = "Reason Missing!";
            return false;
        }

        return true;
    }
</script>
</body>
</html>