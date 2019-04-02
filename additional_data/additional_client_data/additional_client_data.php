<!DOCTYPE html>

<html lang="en">

<head>

    <title>Additional client data</title>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="theme-color" content="##009a9f">

    <link rel="stylesheet" type="text/css" href="/style.css">

</head>

<body>

    <div class="container menu">

    <?php

if(!$_COOKIE["user"]){

    echo "Please login!";

    exit();

}

        $cid = $_POST["cid"];

        $secondary_phoneno = $_POST["secondary_phoneno"];

        $purpose = $_POST["purpose"];

        $username = "u463135857_yxuq";

        $dbname = "u463135857_yxuq";

        $address = "localhost";

        $password = "u463135857_yxuq";

        echo "The entered CID is " . $cid . "<br/>";

        echo "The entered secondary phone number is " . $secondary_phoneno . "<br/>";

        echo "The entered purpose is " . $purpose . "<br/>";

        echo "Checking the connection to the database...<br/>";

        $conn = new mysqli($address ,$username ,$password ,$dbname);

        if($conn->connect_error){

            die ("There was an error connecting to the database! " . $conn->connect_error);

        }

        echo "Successfully connected to the database!<br/>";

        if(strlen($secondary_phoneno) > 10){

            echo "Please enter 10 digit phone number!<br/>";

            exit();

        }

        $sql = "INSERT INTO add_client_details values('$cid', '$secondary_phoneno', '$purpose')";

        if($conn->query($sql) === TRUE){

            echo "The data was added successfully!<br/>";

        }else{

            echo "The data was not pushed! " . $conn->error();

        }

        $conn->close();

    ?>

    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>