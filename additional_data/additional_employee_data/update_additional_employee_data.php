<!DOCTYPE html>

<html lang="en">

<head>

<title>Client Additional Data Updater</title>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/style.css">

    <meta name="theme-color" content="#009a9f">

</head>

<body>

    <div class="container menu">

    <?php

if(!$_COOKIE["user"]){

    echo "Please login!";

    exit();

}

    $sel = $_POST["sel"];

    $id = $_POST["id"];

    $val = $_POST["val"];

    $username = "root";

    $password = "";

    $address = "localhost";

    $dbname = "id3270759_theback1_sid";

    echo "Checking the connection to the database...<br/>";

$conn = new mysqli($address ,$username ,$password ,$dbname);

if($conn->connect_error){

    die("Failed to connect to the server!" . $conn->connect_error);

}

echo "Connected successfully to the database!<br/>";

    echo "The value of EID " . $id . " and column " . $sel . " will be updated to " . $val . "<br/>";

    echo "Now pushing the data into the database...<br/>";

    $sql = "UPDATE add_employee_details SET $sel = '$val' WHERE EID = $id";

    if($conn->query($sql) === TRUE){

        echo "Content updated successfully!";

    }else{

        echo "Error updating the content. " . $conn->error;

    }

    $conn->close();

    ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>