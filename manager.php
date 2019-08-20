<!DOCTYPE html>

<html lang="en">

    <head><title>Welcome to Pages</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/style.css">

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-color" content="#009a9f">

    </head>

<body>
    <div class="container">

<h1>Pages:</h1>

    <?php

    if(!$_COOKIE["user"]){

        echo "Please login!";

        exit();

    }

        echo "<h2>Welcome " . $_COOKIE["user"] . "!</h2><br/>";

    ?>

    </div>

    <div class="container menu">

    <p>These links will take you to the specified pages which contain the data. You can perform all the operations that you need.</p>

    </div>

    <div class= "container menu">

    <h3>Menu:</h3>

    <div class="container">

    <a href="/client_data/client_data.php">Client data</a>

    </div>

    <div class="container">

    <a href="/emp_data/emp_data.php">Employee data</a>

    </div>

<div class="container">

    <a href="/additional_data/additional_data_of_client.html">Available additional data of client</a>

</div>

<div class="container">

    <a href="/additional_data/additional_data_of_emp.html">Available additional data of employees</a>

    </div>

<div class="container">

    <a href="/testclient/testclient_display.php">Test clients</a>

    </div>

<div class="container">

    <a href="/allot.php">Allot customer's</a>

    </div>

<div class="container">

    <a href="/talk.php">Talk</a>

    </div>

<div class="container">

    <a href="/change.php">Change Password</a>

    </div>

    </div>

    <script type="application/javascript">

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>