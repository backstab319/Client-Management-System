<!DOCTYPE html>

<html lang="en">

<head>

    <title>Client data deleter.</title>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="theme-color" content="#009a9f">

    <link rel="stylesheet" type="text/css" href="/style.css">

</head>

<body>

    <div class="container menu">

    <?php

if(!$_COOKIE["user"]){

    echo "Please login!";

    exit();

}

$username = "u463135857_yxuq";

$password = "u463135857_yxuq";

$sadderss = "localhost";

$dbname = "u463135857_yxuq";

$id = $_POST["ID"];

echo "Checking the connection to the database...<br/>";

$conn = new mysqli($saddress ,$username ,$password ,$dbname);

if($conn->connect_error){

    die("Failed to connect to the server!" . $conn->connect_error);

}

echo "Connected successfully to the database!<br/>";

    

    echo "Deleting account priviliges<br/>";

    $sql = "SELECT * FROM client_details WHERE CID=$id";

    $result=$conn->query($sql);

    $row=$result->fetch_assoc();

    $name=$row["Name"];

    $sql="DELETE FROM login_details WHERE user_id='$name' AND user_type='client'";

    $conn->query($sql);

    

$sql = "DELETE FROM client_details WHERE CID=$id";

if($conn->query($sql)){

    echo "Record with " . $id . " deleted successfully!";

}else{

    echo "Error deleting record: " . $conn->error;

}

$conn->close();

?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>